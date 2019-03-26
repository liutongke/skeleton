<?php
/*
 * User: keke
 * Date: 2018/4/21
 * Time: 22:37
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
// 定义项目路径
//defined('API_ROOT') || define('API_ROOT', dirname(__DIR__) . '../');
defined('API_ROOT') || define('API_ROOT', dirname(__DIR__));
define('E_FATAL', E_ERROR | E_USER_ERROR | E_CORE_ERROR |
    E_COMPILE_ERROR | E_RECOVERABLE_ERROR | E_PARSE);
require API_ROOT . '\config\init.php';
\Sapi\Sapi::run();//输出
$di->response->output();