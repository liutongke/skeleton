<?php

namespace App\Example;

class TcpServe
{
    public function onConnect(\Swoole\Server $server, $fd)
    {
        echo "Tcp Client: Connect fd:{$fd}\n";
    }

    public function onReceive(\Swoole\Server $server, $fd, $reactor_id, $data)
    {
        $server->send($fd, "Server: {$data}");
    }

    public function onClose(\Swoole\Server $server, $fd)
    {
        echo "Client: Close fd:{$fd}\n";
    }
}