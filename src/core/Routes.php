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

namespace Sapi\Core;

//路由类
class Routes
{
    public static $routes = [];
    public static $methods = [];
    public static $callbacks = [];
    public static $patterns = array(
        ':any' => '[^/]+',
        ':num' => '[0-9]+',
        ':all' => '.*'
    );
    public static $error_callback;

    public static function __callstatic($method, $params)
    {
        $url = strpos($params[0], '/') === 0 ? $params[0] : '/' . $params[0];
        $callback = $params[1];
        array_push(self::$routes, $url);
        array_push(self::$methods, strtoupper($method));
        array_push(self::$callbacks, $callback);
    }

    public static function route()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        //判断请求的方式是否合法
        if (!in_array($method, self::$methods)) {
            echo '请求方式不合法';
        }
        //判断url是否存在
        if (!in_array($url, self::$routes)) {
            /*
             * 存在
             * 判断是不是闭包函数
             */
            if (is_object(self::$callbacks[0])) {
                echo '闭包函数';
                call_user_func(self::$callbacks[0]);
            } else {
                echo '不是闭包函数';
//                'huawei', 'Admin\Test\Huawei@send_huawei_push'
//                var_dump(explode('@', self::$callbacks[0]));
                $arr = explode('@', self::$callbacks[0]);
                $class_name = $arr[0] . '\\' . $arr[1];
                $obj = new $class_name();        //实例化控制器
//                $action_name = trim(strrchr($arr[0], '\\'), '\\');
                //调用控制器中的方法
                $action_name = $arr[1];
                $obj->$action_name();
            }
        } else {
            //不存在
            echo '当前路由不存在';
        }
    }
}