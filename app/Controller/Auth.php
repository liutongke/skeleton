<?php
/*
 * User: keke
 * Date: 2022/9/6
 * Time: 15:25
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

namespace App\Controller;

use Sapi\Api;

class Auth extends Base
{

    public function rule()
    {
        return [
            'login' => [
                'username' => ['name' => 'username', 'require' => true]
            ]
        ];
    }

    public function login(\Swoole\Http\Request $request, \Swoole\Http\Response $response): array
    {
//        $redis = \App\Ext\Redis::getInstance();
//        $data = [];
//        $data["test"];
//        new data();
//        var_dump($redis);
//        $redis->set("tset", 1, 600);
//        $key = md5(uniqid(mt_rand(1, 999999)));
//        $redis->redis->set($key, $key);
//        $response->end("<h1>hello swoole!</h1>");
//        DI()->logger->info("日志测试{$key}");

        return [
            "code" => 200,
            "msg" => "hello World!",
            "data" => 'api-swoole'
        ];
    }
}