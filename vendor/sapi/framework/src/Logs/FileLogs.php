<?php
/*
 * User: keke
 * Date: 2019/3/18
 * Time: 1:39
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

namespace Sapi\Logs;

use Sapi\Logs;

//记录日志
class FileLogs implements Logs
{
    private $filePath;//日志保存路径
    private static $ERROR = 'error';
    private static $INFO = 'INFO';
    private static $DEBUG = 'debug';

    /**
     * fileLogs constructor.
     * @param $filePath 日志保存位置
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * @desc 系统异常类日记
     * @param $msg
     */
    public function error($msg)
    {
        return $this->log(self::$ERROR, $msg);
    }

    /**
     * @desc 业务纪录类日记
     * @param $msg
     */
    public function info($msg)
    {
        return $this->log(self::$INFO, $msg);
    }

    /**
     * @desc 开发调试类日记
     * @param $msg
     */
    public function debug($msg)
    {
        return $this->log(self::$DEBUG, $msg);
    }

    /**
     * @desc 记录日志信息
     * @param $tyeInfo 日志类型
     * @param $msg 日志信息
     * @return string
     */
    private function log($tyeInfo, $msg)
    {
        return $path = $this->filePath . '/' . $tyeInfo;
        $newMsg = date('Y-m-d H:i:s') . '|' . $tyeInfo . '|' . json_encode($msg);
        return $this->saveLog($path, $newMsg);
    }

    /**
     * @desc 保存文本
     * @param $msg 保存信息
     * @return bool|int
     */
    private function saveLog($path, $msg)
    {
        return @file_put_contents($path, $msg, FILE_APPEND | LOCK_EX);
    }
}