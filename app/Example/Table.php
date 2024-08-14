<?php

namespace App\Example;

use Sapi\Tool;

class Table
{
    public function index(\Swoole\Http\Request $request, \Swoole\Http\Response $response)
    {
//        var_dump(\Sapi\DI()->lock);

        var_dump($data['test']);
//        return [
//            'len' => $request->get['len'],
//            'uuid' => Tool::generateRandomString($request->get['len'])
//        ];
//        $cache = new \Sapi\Cache\FileCache();
//        $uuid = uniqid();
//        $key = md5($uuid . rand(0, 9999) . time() . mt_rand());
//        $res = $cache->set($key, $uuid);
//
//        return [
//            'res' => $res,
//            'uuid' => $uuid,
//            'data' => $cache->get($key),
//        ];
//        \Sapi\Table::set('keke', ['key' => 'set', 'val' => 'val test', 'num' => 999]);
//
//        return [
//            "code" => 200,
//            "msg" => "hello World!",
//            'tm' => date('Y-m-d H:i:s'),
//            "data" => [
//                'name' => 'api-swoole',
//                'getAll' => \Sapi\Table::getAll('keke'),
//                'get' => \Sapi\Table::get('keke', 'val'),
//                'size' => \Sapi\Table::getSize(),
//                'getMemorySize' => \Sapi\Table::getMemorySize(),
//                'exist' => \Sapi\Table::exist('keke'),
//                'count' => \Sapi\Table::count(),
//                'stats' => \Sapi\Table::stats(),
//                'incr' => \Sapi\Table::incr('biubiu', 'num', 100),
//                'decr' => \Sapi\Table::decr('biubiu', 'num', 99),
//                'version' => DI()->config->get('conf.version'),
//            ],
//        ];
    }

    public function get(\Swoole\Http\Request $request, \Swoole\Http\Response $response)
    {
        $table = DI()->table;

        return [
            "code" => 200,
            "msg" => "hello World! test",
            'tm' => date('Y-m-d H:i:s'),
            "data" => [
                'getAll' => $table->getAll('keke'),
                'get' => $table->get('keke', 'val'),
                'name' => 'api-swoole',
                'version' => DI()->config->get('conf.version'),
            ],
        ];
    }
}