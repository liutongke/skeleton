<?php
/*
 * User: keke
 * Date: 2019/3/16
 * Time: 16:16
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
// Autoload 自动载入
require API_ROOT . '/vendor/autoload.php';
require API_ROOT . '/routes/routes.php';
error_reporting(E_ALL | E_STRICT);// 设定错误报告状态为E_ALL和E_STRICT，也就是所有错误均报告
date_default_timezone_set('Asia/Shanghai');// 时区设置
$di = \Sapi\DI();//全局注册
$di->isCli = preg_match("/cli/i", php_sapi_name()) ? true : false;//是否是cli模式
$di->config = new Sapi\Config\FileConfig(API_ROOT . '/config/config.php');
$di->debug = $di->config->get('debug');
$di->logs = new \Sapi\Logs\FileLogs(API_ROOT . '/storage/logs/');//日志保存位置
$di->request = new \Sapi\Request();
$di->response = new \Sapi\Response();
ini_set('display_errors', 'Off');//on显示错误日志off不显示错误日志