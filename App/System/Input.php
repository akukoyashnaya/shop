<?php
namespace App\System;

class Input
{
    private static $params = [];
    
    public function __construct() 
    {
        self::$params = array_merge($_GET, $_POST);
    }
    
    public static function all()
    {
        return self::$params;
    }
    
    public static function get($key, $default = null)
    {
        return array_key_exists($key, self::$params) ? self::$params[$key] : $default;
    }
    
    public static function files($key = null) 
    {
        if($key === null) {
            return $_FILES;
        }
        if(array_key_exists($key, $_FILES)) {
            return $_FILES[$key];
        }
        return null;
    }
    
    public static function set($key, $value)
    {
        if(!array_key_exists($key, self::$params)) {
            self::$params[$key] = $value;
        }
    }
}
