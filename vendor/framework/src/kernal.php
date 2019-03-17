<?php
/*
 * User: keke
 * Date: 2019/3/16
 * Time: 16:20
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

//核心类
class kernal
{
    protected static $instance;
    protected $data = [];//存储初始化数据

    /**
     * 获取DI单体实例
     *
     * - 1、将进行service级的构造与初始化
     * - 2、也可以通过new创建，但不能实现service的共享
     */
    public static function one()
    {
        if (!self::$instance instanceof self)
            self::$instance = new self();
        return self::$instance;
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        return $this->set($name, $value);
    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->get($name);
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }

    private function set($name, $value)
    {
        return $this->data[$name] = $value;
    }

    private function get($name)
    {
        return $this->data[$name];
    }
}