<?php

return [
    \HttpRouter("/param", "App\Example\App@Index"),
    \HttpRouter("/login", "App\Example\Auth@login"),
    \HttpRouter("/logs", "App\Example\Logs@index"),
    \HttpRouter("/mysql/get", "App\Example\MysqlDemo@getOne"),
    \HttpRouter("/mysql/save", "App\Example\MysqlDemo@save"),
    \HttpRouter("/mysql/del", "App\Example\MysqlDemo@del"),
    \HttpRouter("/mysql/update", "App\Example\MysqlDemo@update"),
    \HttpRouter("/redis/setData", "App\Example\RedisDemo@setData"),
    \HttpRouter("/hello", "App\Example\Hello@index"),
    \HttpRouter("/", function (\Swoole\Http\Request $request, \Swoole\Http\Response $response) {
        return [
            "code" => 200,
            "msg" => "hello World!",
            'tm' => date('Y-m-d H:i:s'),
            "data" => [
                'name' => 'api-swoole',
                'version' => DI()->config->get('conf.version'),
            ],
        ];
    }),
];