<?php

namespace App\Example;

use Sapi\Api;

class WebsocketHello extends Api
{
    public function hello(\Swoole\WebSocket\Server $server, array $msg): array
    {
        return [
            'err' => 200,
            'data' => [
                'name' => 'api-swoole',
                'version' => DI()->config->get('conf.version'),
            ]
        ];
    }
}