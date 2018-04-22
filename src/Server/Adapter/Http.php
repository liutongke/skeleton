<?php
/*
 * User: keke
 * Date: 2018/4/22
 * Time: 14:37
 *——————————————————佛祖保佑 ——————————————————
 *                   _ooOoo_
 *                  o8888888o
 *                  88" . "88
 *                  (| -_- |)
 *                  O\  =  /O
 *               ____/`---'\____
 *             .'  \|     |//  `.
 *            /  \|||  :  |||//  \
 *           /  _||||| -:- |||||-  \
 *           |   | \\  -  /// |   |
 *           | \_|  ''\---/''  |   |
 *           \  .-\__  `-`  ___/-. /
 *         ___`. .'  /--.--\  `. . __
 *      ."" '<  `.___\_<|>_/___.'  >'"".
 *     | | :  ` - `.;`\ _ /`;.`/ - ` : | |
 *     \  \ `-.   \_ __\ /__ _/   .-` /  /
 *======`-.____`-.___\_____/___.-`____.-'======
 *                   `=---='
 *——————————————————代码永无BUG —————————————————
 */

namespace Sapi\Server\Adapter;

use Sapi\Core\Routes;

class Http
{
    //http server 对象
    private $_server;

    /**
     * 初始化http server对象
     *
     **/
    public function __construct()
    {
        $this->_server = new \swoole_http_server("0.0.0.0", 9501);;
    }

    //swoole http的启动类
    public function run()
    {
        //http server设置
        $this->_server->set(
            array(
                'worker_num' => 2
            )
        );
        $this->_server->on('WorkerStart', array($this, 'onWorkerStart'));
        //事件绑定
        $this->_server->on('request', array($this, 'onRequest'));
//        $this->_server->on('close', array($this, 'onClose'));
        //启动http server
        $this->_server->start();
    }

    //worker
    public function onWorkerStart()
    {
//        define("ROOTPATH", __DIR__);
//        require_once __DIR__ . '/vendor/autoload.php';
        require_once '/usr/local/nginx/swoole/vendor/autoload.php';
    }

    /**
     * 请求处理函数
     * @param swoole\http\request $req 请求对象(包含header,server等属性)
     * @param swoole\http\response $res 响应对象
     **/
    public function onRequest($request, $response)
    {
        ob_start();

        //将请求和响应对象传入到dispatcher中
//        var_dump($request);
        require_once '/usr/local/nginx/swoole/routes/routes.php';
        Routes::route($request, $response);

        $result = ob_get_contents();
        ob_end_clean();
        $response->header('content-type', 'text/html; charset=UTF-8', false);
        $response->end($result);
//        Dispatcher::getInstance()->route($request, $response);
    }

//    public function onClose()
//    {
//        echo 'closing.....';
//    }
}