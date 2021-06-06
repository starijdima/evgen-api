<?php 

 /*
 |--------------------------------------------------------------------------
 | Файл обработки базы данных
 |--------------------------------------------------------------------------
 |
 |
 | Подробнее: 
 |
 */

namespace SDFramework;
use SDFramework\Environment;

class Database
{
    public $ORM;
    public function __construct()
    {
        $this->ORM = new \RedBeanPHP\R();
        $this->ORM->setup($_ENV['DB_TYPE'].':host='.$_ENV['DB_HOST'].';port='.$_ENV['DB_PORT'].';dbname='.$_ENV['DB_NAME'].'', $_ENV['DB_USER'], $_ENV['DB_PASS'] );
    }
    public function testConnection()
    {
        return $this->ORM->testConnection();
    }
}

?>