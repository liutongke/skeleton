<?php

namespace App\Ext;

class Redis
{
    private static $_instance = NULL;
    public $redis = "";

    //对redis连接的封装
    public function __construct()
    {
        $config = DI()->config->get('conf.redis');
        //连接数据库
        $this->redis = new \Redis();
        $this->redis->connect($config['host'], $config['port']);
        //授权
        $config['auth'] == '' ?: $this->redis->auth($config['auth']);
        $this->redis->select($config['db_index']);
    }

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}