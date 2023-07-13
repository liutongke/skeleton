<?php

namespace App\Example;

class Auth extends HttpBase
{

    public function rule()
    {
        return [
            'login' => [
                'username' => ['name' => 'username', 'require' => true, 'type' => 'string', 'source' => 'post', 'message' => '必须携带username'],
            ]
        ];
    }

    public function login(\Swoole\Http\Request $request, \Swoole\Http\Response $response): array
    {
        return [
            "code" => 200,
            "msg" => "login",
            "data" => [
                'username' => $request->post['username']
            ]
        ];
    }
}