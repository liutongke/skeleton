<?php

namespace App\Example;

class UdpServe
{
    public function onPacket(\Swoole\Server $server, string $data, array $clientInfo)
    {
        $server->sendto($clientInfo['address'], $clientInfo['port'], "Server：{$data}");
    }
}