<?php

namespace App\Example;

class Logs
{

    public function index(\Swoole\Http\Request $request, \Swoole\Http\Response $response)
    {
        DI()->logger->debug("日志测试debug");
        DI()->logger->info("日志测试info");
        DI()->logger->notice("日志测试notice");
        DI()->logger->warning("日志测试warning");
        DI()->logger->error("日志测试error");
        return [
            'code' => 200,
            'data' => [
                'info' => 'log',
            ],
        ];
    }
}