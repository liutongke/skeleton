<?php

return [
    WsRouter("/hello", "\App\Example\WebsocketHello@hello"),
    WsRouter("/login", "\App\Example\Websocket@Index"),
];