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
date_default_timezone_set('Asia/Shanghai');// 时区设置
$di = \Sapi\kernal::one();//全局注册
$di->isCli = preg_match("/cli/i", php_sapi_name()) ? true : false;//是否是cli模式
$di->config = new Sapi\Config\FileConfig(API_ROOT . '/config/config.php');
$di->logs = new \Sapi\Logs\FileLogs(API_ROOT . '/storage/logs/');//日志保存位置
$di->request = new \Sapi\Request();
$di->response = new \Sapi\Response();