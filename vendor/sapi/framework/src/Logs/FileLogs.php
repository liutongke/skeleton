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

namespace Sapi\Config;

use Sapi\Config;
use Sapi\Logs;

//记录日志
class FileLogs implements Logs
{
    private $filePath;

    /**
     * fileLogs constructor.
     * @param $filePath 日志保存位置
     */
    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function get()
    {
    }

    public function set($msg)
    {
        return @file_put_contents($this->filePath, $msg);
    }

    private function log()
    {
//        2018-09-10 12:01:33|ERROR|alert_err:App.Auth.Index|<br />
//<b>Warning</b>:  Redis::expire() expects exactly 2 parameters, 1 given in <b>D:\phpstudy\project\h5_patch_color_php\src\app\Model\LoginLogDao.php</b> on line <b>51</b><br />
//        2018-09-10 10:23:46|DEBUG|REQ:App.Site.Index|
//  =>[13,"127.0.0.1",null,{"s":"App.Site.Index"},[]]
//    {"code":0,"data":{"title":"Hello Color","version":"2.2.3","time":1536546226},"debug":{"stack":["[#0 - 0ms]D:\\phpstudy\\project\\h5_patch_color_php\\public\\index.php(8)"],"sqls":[],"version":"2.2.3"}}
        return date('Y-m-d H:i:s').'|'.'报错级别|';
    }
}