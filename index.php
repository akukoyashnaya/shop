<?php
session_start();


$baseUrl = $_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'];
$baseUrl = str_replace('index.php', '', $baseUrl);
$baseUrl = $_SERVER['REQUEST_SCHEME'].'://'.$baseUrl;

define('BASE_URL', $baseUrl);
define('APP_PATH', __DIR__.DIRECTORY_SEPARATOR.'App'.DIRECTORY_SEPARATOR);
define('IMG_PATH', __DIR__.DIRECTORY_SEPARATOR.'public/images'.DIRECTORY_SEPARATOR);

$composer = include 'vendor/autoload.php';
$composer->add('App', __DIR__);

include APP_PATH.'Config'.DIRECTORY_SEPARATOR.'db.php';
echo \App\System\Router::init();

