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
//    \HttpRouter("/hello/index", "App\Example\Hello@index"),
    \HttpRouter("/", "App\Example\Hello@index"),
    \HttpRouter("/swoole/table", "App\Example\Hello@index"),
//    \HttpRouter("/", "App\Example\Table@index"),
//    \HttpRouter("/test", "App\Example\Table@get"),
    \HttpRouter("/hp", "App\Example\Hp@index"),
];