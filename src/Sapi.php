<?php
/*
 * User: keke
 * Date: 2018/4/21
 * Time: 23:41
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
class Sapi
{
    public static function run()
    {
        // Autoload 自动载入
        require ROOTPATH . '/vendor/autoload.php';
//var_dump(ROOTPATH);
        require ROOTPATH . '/routes/routes.php';
    }
}

//define("ROOTPATH", __DIR__);
//
//require_once ROOTPATH . '/vendor/autoload.php';
//require_once ROOTPATH . '/routes/routes.php';