<?php

namespace App\Example;

use Sapi\Api;

class WsBase extends Api
{
    public function userWsCheck(\Swoole\WebSocket\Frame $frame): string
    {
        $res = json_decode($frame->data, true);

        if (!isset($res['data']["x-token"]) || $res['data']["x-token"] != "123123") {
            return "token expired";
        }
        return "";
    }
}