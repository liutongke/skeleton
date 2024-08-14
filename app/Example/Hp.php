<?php

namespace App\Example;

class Hp
{
    public function index(\Swoole\Http\Request $request, \Swoole\Http\Response $response)
    {
        $hp = new \Sapi\Utils\Hp(123);
        $data = $hp->getHpData();

        return [
            'code' => 200,
            'hp' => $data
        ];
    }
}