<?php
namespace App\System;
class View
{
    // $page = users // $params = ['page' => [['username' => 'moshe'],['username' => 'roey']]]
    public static function make($page, $params = [])
    {
        
        // $page = users
        $page .= '.php';
        // $page = users.php
        $page = APP_PATH.'View/'.$page;
        //dump($page);
        $_view_file_path = realpath($page);
       // dump($_view_filr_path);
        // $path = C:\xampp\htdocs\mvc\app\view\users.php
        unset($page);
        
        extract($params, EXTR_SKIP);
        // $users = [['username' => 'moshe'],['username' => 'roey']]
        
        ob_start();
        include $_view_file_path;
        return ob_get_clean();
    }
}
