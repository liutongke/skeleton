<?php
/*
 * User: keke
 * Date: 2018/4/22
 * Time: 0:43
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

//路由类
class Routes
{
    private static $_instance;
    public static $routes = [];
    public static $methods = ['get', 'post', 'cli'];
    public static $callbacks = [];
    public static $patterns = array(
        ':any' => '[^/]+',
        ':num' => '[0-9]+',
        ':all' => '.*'
    );
    public static $error_callback;

    public static function getInstance()
    {
        if (!self::$_instance || !self::$_instance instanceof self) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public static function __callstatic($method, $params)
    {
        $url = strpos($params[0], '/') === 0 ? $params[0] : '/' . $params[0];
        $callback = $params[1];
        array_push(self::$routes, $url);
        array_push(self::$methods, strtoupper($method));
        array_push(self::$callbacks, $callback);
    }

    public static function init()
    {

    }

    public static function route($request, $response)
    {
        $di = kernal::one();
        try {
            //普通请求
            $url = parse_url($request['GET_URL'], PHP_URL_PATH);
            $method = $request['REQUEST_METHOD'];//请求方式
            //判断请求的方式是否合法
            if (!in_array($method, self::$methods)) {
                $responseData = '请求方式不合法';
            }
            //判断url是否存在
            if (in_array($url, self::$routes)) {
                $key = array_search($url, self::$routes);//对应的路由下标
                if (is_object(self::$callbacks[$key])) {//判断是不是闭包函数
                    $responseData = call_user_func(self::$callbacks[$key]);
                } else {
//                'huawei', 'Admin\Test\Huawei@send_huawei_push'
//                var_dump(explode('@', self::$callbacks[0]));
                    $arr = explode('@', self::$callbacks[$key]);
                    $obj = new $arr['0']();        //实例化控制器
                    $action_name = $arr['1'];//调用控制器中的方法
                    $responseData = $obj->$action_name();
                }
            } else {
                //不存在
                $responseData = '当前路由不存在';
            }
        } catch (\Exception $e) {
            $responseData = ['error' => 404];
        }
        return $di->response->setData($responseData);
    }
}