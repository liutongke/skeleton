<?php

namespace App\Controller;

use Sapi\Api;

class App extends Api
{
    public function rule()
    {
        return [
//            'Index' => [
//                'pic' => ['name' => 'pic', 'require' => true]
//            ]
        ];
    }

    public function Index(\Swoole\Http\Request $request, \Swoole\Http\Response $response): array
    {
        return [
            "code" => 200,
            "msg" => "hello World!",
            "data" => [
                'name' => 'api-swoole',
                'version' => '1.0.0',
            ],
        ];
    }

    public function post(\Swoole\Http\Request $request, \Swoole\Http\Response $response): array
    {
        $tm = date('Y-m-d H:i:s');
        return $request->post;
    }
}