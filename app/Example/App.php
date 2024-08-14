<?php

namespace App\Example;

use Sapi\Api;

//字段验证
class App extends Api
{
    public function rule()
    {
        return [
            'Index' => [
                'intValue' => ['name' => 'intValue', 'require' => true, 'type' => 'int', 'source' => 'post', 'message' => 'intValue必须携带'],
                'stringValue' => ['name' => 'stringValue', 'require' => true, 'type' => 'string', 'source' => 'post', 'message' => 'stringValue必须携带'],
                'floatValue' => ['name' => 'floatValue', 'require' => true, 'type' => 'float', 'source' => 'post', 'message' => 'floatValue是必须的'],
                'boolValue' => ['name' => 'boolValue', 'require' => true, 'type' => 'bool', 'source' => 'post', 'message' => 'boolValue是必须的'],
                'arrayValue' => ['name' => 'arrayValue', 'require' => true, 'type' => 'array', 'source' => 'post', 'message' => 'arrayValue是必须的'],
                'file' => ['name' => 'file', 'require' => false, 'type' => 'file', 'ext' => 'jpeg,png,txt', 'source' => 'post', 'message' => 'file文件是必须的'],
                'x-token' => ['name' => 'x-token', 'require' => true, 'type' => 'string', 'source' => 'header', 'message' => '缺少请求头x-token'],
            ]
        ];
    }

    public function Index(\Swoole\Http\Request $request, \Swoole\Http\Response $response): array
    {
        return [
            "code" => 200,
            "msg" => "hello World!",
            'tm' => date('Y-m-d H:i:s'),
            "data" => [
                'name' => 'api-swoole',
                'version' => DI()->config->get('conf.version'),
                'intValue' => $request->post['intValue'],
                'stringValue' => $request->post['stringValue'],
                'floatValue' => $request->post['floatValue'],
                'boolValue' => $request->post['boolValue'],
                'arrayValue' => $request->post['arrayValue'],
                'x-token' => $request->header['x-token'],
                'file' => saveFile($request, './storage/pic/')
            ],
        ];
    }
}