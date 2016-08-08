<?php
namespace App\System;


class Router
{
    private static $routes = [];
    
    public static function init()
    {
        new Input();
        
        include APP_PATH.'Config/routes.php';
        $method = strtoupper($_SERVER['REQUEST_METHOD']);
        $templates = Router::$routes[$method];
        $current = HTTP::currentUri();
        $params = [];
        $thingsToDo = null;
        
        if(array_key_exists($current, $templates)) {
            $thingsToDo = $templates[$current];
            return Router::run($thingsToDo, $params);
        }
        
        $uriArr = explode('/', $current);
        $found = false;
        
        foreach($templates as $template => $load) {
            $tempArr = explode('/', $template);
            if(count($uriArr) !== count($tempArr)) {
                $found = false;
                continue;
            }
            
            foreach($tempArr as $key => $value) {
                if(strpos($value, '{') === 0 && strpos($value, '}') !== false){
                    $pKey = trim($value, '{}');
                    $pVal = $uriArr[$key];
                    $params[$pKey] = $pVal;
                    $found = true;
                }
                elseif($value == $uriArr[$key]) {
                    $found = true;
                }
                else{
                    $found = false;
                    $params = [];
                    break;
                }
            }
            
            if($found) {
                $thingsToDo = $load;
                break;
            }
        }
        
        if(!$found) {
            die('404 Page not found');
        }
        
        return Router::run($thingsToDo, $params);
    }
    
    private static function run($loader, $params)
    {
        foreach ($params as $k => $v) {
            \App\System\Input::set($k, $v);
        }
        
        if(is_callable($loader)) {
            //$loader();
            return call_user_func($loader);
        }
        
        $segments = explode('@', $loader);
        $class = $segments[0];
        $func = $segments[1];
        
        $class = '\\App\\Controller\\'.$class;
        
        $class = new $class();
        return $class->$func();
    }
    
    public static function get($template, $callback)
    {
        Router::$routes['GET'][$template] = $callback;
    }
    
    public static function post($template, $callback)
    {
        Router::$routes['POST'][$template] = $callback;
    }
    
    public static function any($template, $callback)
    {
        Router::$routes['GET'][$template] = $callback;
        Router::$routes['POST'][$template] = $callback;
    }
}
