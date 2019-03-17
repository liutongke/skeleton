<?php
/*
 * User: keke
 * Date: 2019/3/16
 * Time: 18:33
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

class Response
{

    /**
     * @var int $ret 返回状态码，其中：200成功，400非法请求，500服务器错误
     */
    protected $code = 200;

    /**
     * @var array 待返回给客户端的数据
     */
    protected $data = [];

    /**
     * @var string $msg 错误返回信息
     */
    protected $msg = '';

    /**
     * @var array $headers 响应报文头部
     */
    protected $headers = [];

    /**
     * @var array $debug 调试信息
     */
    protected $debug = [];

    /** ------------------ setter ------------------ **/

    /**
     * 设置返回状态码
     * @param int $ret 返回状态码，其中：200成功，400非法请求，500服务器错误
     * @return Response
     */
    public function setRet($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * 设置返回数据
     * @param array /string $data 待返回给客户端的数据，建议使用数组，方便扩展升级
     * @return Response
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * 设置错误信息
     * @param string $msg 错误信息
     * @return Response
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
        return $this;
    }

    /**
     * 设置调试信息
     * @param   string $key 键值标识
     * @param   mixed $value 调试数据
     * @return  Response
     */
    public function setDebug($key, $value)
    {
        if (DI()->debug) {
            $this->debug[$key] = $value;
        }
        return $this;
    }

    /** ------------------ 结果输出 ------------------ **/

    /**
     * 结果输出
     */
    public function output()
    {
        $rs = $this->getResult();
        echo json_encode($rs);
    }

    public function getResult()
    {
        $rs = array(
            'code' => $this->code,
            'data' => $this->data,
            'msg' => $this->msg,
        );

        if (!empty($this->debug)) {
            $rs['debug'] = $this->debug;
        }

        return $rs;
    }

    /**
     * 获取头部
     *
     * @param string $key 头部的名称
     * @return string/array 对应的内容，不存在时返回NULL，$key为NULL时返回全部
     */
    public function getHeaders($key = NULL)
    {
        if ($key === NULL) {
            return $this->headers;
        }

        return isset($this->headers[$key]) ? $this->headers[$key] : NULL;
    }
}