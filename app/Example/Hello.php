<?php

namespace App\Example;

use Sapi\Api;

class Hello extends Api
{
    public function index()
    {
        return [
            'code' => 200,
            'data' => [
                'name' => 'api-swoole',
                'version' => DI()->config->get('conf.version'),
            ],
        ];
    }
}