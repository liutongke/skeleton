<?php
/*
 * User: keke
 * Date: 2018/4/22
 * Time: 13:49
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

namespace App\Controllers;

use pdo\Config;
use pdo\DB;
use pdo\MyPdo;
use function Sapi\DI;
use Sapi\Logs\Log;

class Test
{
    public function Test()
    {
//        return new tt();
//        return trigger_error('Trigger Error');
//        return Log::info('test');
//        return DI()->debugs;//false生产环境true开发环境
//        return Config::config();
//        return DB::table('test');
        return DB::table('test')->where(['id' => 13])->get();
        return DI()->logs->info([12213333333333333333333]);
        return count(false);
        $modle = new Models();
        $arr = [
            'modle' => $modle,
            'result' => 'success'
        ];
        return $arr;
    }
}