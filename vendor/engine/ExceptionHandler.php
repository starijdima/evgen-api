<?php 
//Обработчик контроллеров
// @controller.php

namespace SDFramework;
use SDFramework\Environment;

//Класс
class ExceptionHandler
{
    public function ReturnResponseCode($arg=200) 
    { 
        if( $arg==200 || $arg==404 || $arg==403 || $arg==401 || $arg==500)call_user_func(array($this,'Return'.$arg));    
    }

    private function Return404()
    {
        ob_end_clean() ;
        header("HTTP/1.1 404 Not Found");
        exit;
    }

    private function Return403()
    {
        ob_end_clean() ;
        header("HTTP/1.1 403 Forbidden");
        exit;
    }
    
    private function Return401()
    {
        ob_end_clean() ;
        header("HTTP/1.1 401 Unauthorized");
        exit;
    }

    private function Return500()
    {
        ob_end_clean() ;
        header("HTTP/1.1 500 Internal Server Error");
        exit;
    }

    private function Return200()
    {
        ob_end_clean() ;
        header("HTTP/1.1 200 OK");
    }
}

?>