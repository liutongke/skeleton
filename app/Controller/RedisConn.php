<?php

namespace App\Controller;

use App\Ext\Redis;

class RedisConn
{
    public function setData(\Swoole\Http\Request $request, \Swoole\Http\Response $response)
    {
        $redis = new \Simps\DB\BaseRedis();
        $res = $redis->set($request->get['key'], $request->get['val']);
        return [
            "code" => 200,
            "msg" => "hello World!",
            "data" => [
                'res' => $res,
                'key' => $request->get['key'],
                'val' => $request->get['val'],
            ],
        ];
    }
}