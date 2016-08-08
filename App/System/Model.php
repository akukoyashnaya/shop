<?php
namespace App\System;

class Model
{
    protected $table = '';
    
    public function __construct() 
    {
        $class = static::class;
        $class = explode('\\', $class);
        $this->table = strtolower(end($class));
    }
    public static function all()
    {
        
    }
}