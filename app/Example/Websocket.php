<?php

namespace App\Example;

class Websocket extends WsBase
{
    public function rule()
    {
        return [
            'Index' => [
                'intValue' => ['name' => 'intValue', 'require' => true, 'type' => 'int', 'message' => 'intValue必须携带'],
                'stringValue' => ['name' => 'stringValue', 'require' => true, 'type' => 'string', 'message' => 'stringValue必须携带'],
                'floatValue' => ['name' => 'floatValue', 'require' => true, 'type' => 'float', 'message' => 'floatValue是必须的'],
                'boolValue' => ['name' => 'boolValue', 'require' => true, 'type' => 'bool', 'message' => 'boolValue是必须的'],
                'arrayValue' => ['name' => 'arrayValue', 'require' => true, 'type' => 'array', 'message' => 'arrayValue是必须的'],
                'x-token' => ['name' => 'x-token', 'require' => true, 'type' => 'string', 'message' => '缺少请求头x-token'],
            ]
        ];
    }


    public function Index(\Swoole\WebSocket\Server $server, array $msg): array
    {
        return [
            'err' => 200,
            'data' => [
                'intValue' => $msg['intValue'],
                'stringValue' => $msg['stringValue'],
                'floatValue' => $msg['floatValue'],
                'boolValue' => $msg['boolValue'],
                'arrayValue' => $msg['arrayValue'],
                'x-token' => $msg['x-token'],
            ]
        ];
    }

}