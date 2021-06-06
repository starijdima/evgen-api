<?php 
//Обработчик public
// @Public.php
namespace SDFramework;
use \SDFramework\Controller;
use \SDFramework\Router;
use \SDFramework\HttpRequests;
use \SDFramework\Environment;
use \SDFramework\Cors;
use \SDFramework\Cache;
use \SDFramework\ExceptionHandler;
use \SDFramework\Headers;
use \DebugBar\StandardDebugBar;
use \RedBeanPHP\R as R;


class Pub
{
    private $environment;
    private $cors;
    private $exception;
    private $headers;
    private $cache;
    public function __construct()
    {
        $environment = new Environment();
        $cors = new Cors();
        $headers = new Headers();
        $exception = new ExceptionHandler();
        $cache = new Cache();
        $cache->setAutoSave(true);
        $headers->ReturnDefaultHeaders();
        $cors->ReturnCorsHeader();     
        $exception->ReturnResponseCode(200);
    }

    private function require_dir($dir, $sort=0)
    {
        
        $list = scandir($dir, $sort);
        if (!$list) return false;
        if ($sort == 0) unset($list[0],$list[1]);
        else unset($list[count($list)-1], $list[count($list)-1]);
        foreach ($list as $rel) 
        {
            return $dir.'/'.$rel;
        }
    }

    public function run()
    {
        $route = (new \SDFramework\Router)->middleware();
        require_once $this->require_dir(__DIR__."/../../controllers");
        require_once $this->require_dir(__DIR__."/../../routes");      
        $route->run();       
    }
}

?>