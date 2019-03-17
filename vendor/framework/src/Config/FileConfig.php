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
        $fileName = $keyArr['0'];

        if (!isset($this->map[$fileName])) {
            $this->map[$fileName] = $this->loadConfig($fileName);
        }

        $rs = NULL;
        $preRs = $this->map;
        foreach ($keyArr as $subKey) {
            if (!isset($preRs[$subKey])) {
                $rs = NULL;
                break;
            }
            $rs = $preRs[$subKey];
            $preRs = $rs;
        }
        return $rs !== NULL ? $rs : $default;
    }

    /**
     * @desc 读取配置文件
     * @return mixed
     */
    private function loadConfig()
    {
        return @include $this->path;
    }
}