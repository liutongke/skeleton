<?php


namespace App\Controller;


class TcpServe
{
    public function onReceive($server, $fd, $threadId, $data)
    {
        echo $data;
    }
}