<?php

namespace App\Controller;

use App\Ext\Redis;

class RedisConn
{
    public function index()
    {
        $redis = Redis::getInstance();
        $res = $redis->redis->set('test', 'test');
        return [
            "code" => 200,
            "msg" => "hello World!",
            "data" => [
                'res' => $res,
            ],
        ];
    }
}