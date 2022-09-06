<?php


namespace App\Controller;


use Sapi\Api;

class Websocket extends Api
{
//    public function userCheck()
//    {
//        return "需要userCheck";
//    }

    public function rule()
    {
        return [
            'index' => [
                'data' => ['name' => 'data', 'require' => true]
            ]
        ];
    }

    public function index(\Swoole\WebSocket\Server $server, array $msg): array
    {
        return ['err' => 200, 'data' => 'hello apiSwoole'];
    }

}