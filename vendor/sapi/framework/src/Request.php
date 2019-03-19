<?php
/*
 * User: keke
 * Date: 2019/3/16
 * Time: 18:22
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

namespace Sapi;

class Request
{
    protected $requestData;
    protected $responseData = null;
    private $di;

    public function __construct()
    {
        $this->di = kernal::one();
        $this->setData();
    }

    /**
     * @desc 启动项目
     */
    public static function run()
    {
        return (new self())->route();
    }

    /**
     * @desc 调用路由进行解析
     * @return mixed
     */
    public function route()
    {
        return Routes::route($this->requestData, $this->responseData);
    }

    /**
     * @desc 获取cli参数 key=value
     * @return array
     */
    private function getClitArgs()
    {
        global $argv;
        array_shift($argv);
        $args = array();
        array_walk($argv, function ($v, $k) use (&$args) {
            @list($key, $value) = @explode('=', $v);
            $args[$key] = $value;
        });
        return $args;
    }

    /**
     * @desc 设置请求参数
     */
    public function setData()
    {
        if ($this->di->isCli) {
            $cli = $this->getClitArgs();
            $this->requestData['REQUEST_METHOD'] = 'cli';
            return $this->requestData['GET_URL'] = $cli['url'];
        } else {
            return $this->requestData = $this->getHeader();
        }
    }

    public function getHeader()
    {
        $_SERVER['GET_URL'] = $this->getUrl();
        return $_SERVER;
    }

    public function getUrl()
    {
        if (preg_match("/cli/i", php_sapi_name()) ? true : false) {
            return $_SERVER['argv'];
        }
        return $_SERVER['REQUEST_URI'];
    }
}