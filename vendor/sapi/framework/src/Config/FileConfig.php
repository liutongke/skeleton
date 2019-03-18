<?php
/*
 * User: keke
 * Date: 2019/3/16
 * Time: 22:59
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

namespace Sapi\Config;

use Sapi\Config;

class FileConfig implements Config
{
    private $path;
    private $map;

    public function __construct($pathInfo)
    {
        $this->path = $pathInfo;
    }

    /**
     * @desc 读取配置文件
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = NULL)
    {
        // TODO: Implement get() method.
        $keyArr = explode('.', $key);
        if (!isset($this->map)) {
            $this->loadConfig();
        }
        $val = $this->map;
        foreach ($keyArr as $key => $value) {//循环赋值去除数组
            if (!isset($val[$value])) {
                $val = null;
            }
            $rs = $val[$value];
            $val = $rs;
        }
        return $val !== NULL ? $val : $default;
    }

    /**
     * @desc 读取配置文件
     * @return mixed
     */
    private function loadConfig()
    {
        $this->map = $configList = @include $this->path;
    }
}