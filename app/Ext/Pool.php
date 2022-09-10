<?php
/*
 * User: keke
 * Date: 2022/9/10
 * Time: 2:21
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

namespace App\Ext;

use Sapi\Singleton;
use Simps\DB\PDO;
use Simps\DB\Redis;

class Pool
{
    use Singleton;

    public function startPool(...$args)
    {
        $mysql_config = DI()->config->get('conf.mysql');
        if (!empty($mysql_config)) {
            PDO::getInstance($mysql_config);
        }

        $redis_config = DI()->config->get('conf.redis');
        if (!empty($redis_config)) {
            Redis::getInstance($redis_config);
        }
    }
}