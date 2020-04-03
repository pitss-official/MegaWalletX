<?php
//require 'application/misc.php';
//dd($_SERVER,true);
//if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
//    return false;
//}
$bootstrapper = require_once 'application'.DIRECTORY_SEPARATOR.'bootstrap.php';
$uri = $_SERVER['REQUEST_URI'];
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    http_redirect('/public/'.$uri);
}else{
    $router= \System\Router::bootstrap()->dispatch();
}
