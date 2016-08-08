<?php
namespace App\System;

class Session
{
    public static function get($key, $default = null)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
    }
    
    public static function set($key, $value, $force = true)
    {
        if($force) {
            $_SESSION[$key] = $value;
        }
        else {
            if(!isset($_SESSION[$key])) {
                $_SESSION[$key] = $value;
            }
        }
    }
    
    public static function all()
    {
        return $_SESSION;
    }
    
    public static function clear()
    {
        $_SESSION = [];
        session_destroy();
        session_start();
    }
}
