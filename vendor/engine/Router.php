<?php 
//Обработчик роутов
// @Router.php

namespace SDFramework;
use SDFramework\Environment;
//Класс
class Router
{
    public function middleware()
    {
        $router = new \Bramus\Router\Router();
        return $router;
    }
     
}

?>