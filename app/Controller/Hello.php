<?php
/*
 * User: keke
 * Date: 2022/9/5
 * Time: 23:49
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

use Sapi\Rule;

class Hello extends Rule
{
    public function rule()
    {

    }

    public function index(\Swoole\Http\Request $request, \Swoole\Http\Response $response)
    {
        DI()->logger->debug("日志测试debug");
        DI()->logger->info("日志测试info");
        DI()->logger->notice("日志测试notice");
        DI()->logger->waring("日志测试waring");
        DI()->logger->error("日志测试error");
        return [
            'code' => 200,
            'data' => 'hello world',
            'conf' => DI()->config->get('conf.tcp'),
        ];
    }
}