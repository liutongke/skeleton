<?php

return [
    \HttpRouter("/", "App\Controller\App@Index"),
    \HttpRouter("/login", "App\Controller\Auth@login"),
    \HttpRouter("/logs", "App\Controller\Logs@index"),
    \HttpRouter("/demo", "App\Controller\Demo@demo"),
    \HttpRouter("/start", function (\Swoole\Http\Request $request, \Swoole\Http\Response $response) {
        $response->end('hello');
    })
];