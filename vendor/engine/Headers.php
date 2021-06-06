<?php 

 /*
 |--------------------------------------------------------------------------
 | HTTP headers Конфигурационный класс
 |--------------------------------------------------------------------------
 |
 | Здесь вы можете настроить параметры заголовков по умолчанию
 | Класс определяет, какие кодировки и заголовки использовать по умолчанию
 | в веб-браузерах. Вы можете настроить эти параметры по мере необходимости.
 |
 | Подробнее: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers
 |
 */

namespace SDFramework;
use SDFramework\Environment;
class Headers
{
    public function ReturnDefaultHeaders() 
    { 
        header('Content-Type: text/html; charset=utf-8');
    }
}
?>