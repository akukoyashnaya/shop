<?php
namespace App\System;

class HTTP
{
    public static function currentUri()
    {
        $uri = '/';
        if(empty($_SERVER['REDIRECT_URL'])) {
            return $uri;
        }
        
        $uri = str_ireplace(BASE_URL, '', $_SERVER['REDIRECT_URL']);

        $uri = explode('?', $uri);
        $uri = $uri[0];
        return trim($uri, '/');
    }
}