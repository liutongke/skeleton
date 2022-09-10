<?php

namespace App\Controller;

use Simps\DB\BaseModel;

class MysqlDemo
{
    public function getOne(\Swoole\Http\Request $request, \Swoole\Http\Response $response)
    {
        $uid = $request->get['uid'];

        $database = new BaseModel();
        $res = $database->select("user_info", [
            "uid",
            "nick",
        ], [
            "uid" => $uid
        ]);

        return [
            "code" => 200,
            "msg" => "MysqlDemo getOne",
            "data" => [
                'res' => $res,
                'uid' => $uid,
            ],
        ];
    }

    public function save(\Swoole\Http\Request $request, \Swoole\Http\Response $response)
    {
        $username = $request->get['username'];
        $database = new BaseModel();
        $last_user_id = $database->insert("user_info", [
            "uid" => time(),
            "nick" => $username,
        ]);

        return [
            "code" => 200,
            "msg" => "MysqlDemo save",
            "data" => [
                'last_user_id' => $last_user_id,
                'username' => $username,
            ],
        ];
    }

    public function del(\Swoole\Http\Request $request, \Swoole\Http\Response $response)
    {
        $uid = $request->get['uid'];

        $database = new BaseModel();

        $res = $database->delete("user_info", [
            "uid" => $uid
        ]);

        return [
            "code" => 200,
            "msg" => "MysqlDemo del",
            "data" => [
                'res' => $res,
                'uid' => $uid,
            ],
        ];
    }

    public function update(\Swoole\Http\Request $request, \Swoole\Http\Response $response)
    {
        $uid = $request->get['uid'];
        $username = $request->get['username'];

        $database = new BaseModel();

        $res = $database->update("user_info", [
            "nick" => $username
        ], [
            "uid" => $uid
        ]);

        return [
            "code" => 200,
            "msg" => "MysqlDemo update",
            "data" => [
                'res' => $res,
                'uid' => $uid,
                'username' => $username,
            ],
        ];
    }
}