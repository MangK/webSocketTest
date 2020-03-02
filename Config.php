<?php
namespace App\WebSocket;

class Config implements \ArrayAccess
{
    private $path;
    private $config;
    private static $instance;

    public function __construct()
    {
        $this->path =  './config/';
    }

    // 单例模式
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function offsetSet($offset, $value)
    {
        // 阉割
    }

    public function offsetGet($offset)
    {
        if (empty($this->config)) {
            $this->config[$offset] = require $this->path . $offset . ".php";
        }
        return $this->config[$offset];
    }

    public function offsetExists($offset)
    {
        return isset($this->config[$offset]);
    }

    public function offsetUnset($offset)
    {
        // 阉割
    }

    // 禁止克隆
    final private function __clone(){}
}
