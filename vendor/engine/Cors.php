<?php 

 /*
 |--------------------------------------------------------------------------
 | Cross-Origin Resource Sharing (CORS) Конфигурационный класс
 |--------------------------------------------------------------------------
 |
 | Здесь вы можете настроить параметры общего доступа к ресурсам
 | или "CORS". Класс определяет, какие операции между источниками могут выполняться
 | в веб-браузерах. Вы можете настроить эти параметры по мере необходимости.
 |
 | Подробнее: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
 |
 */

namespace SDFramework;
use SDFramework\Environment;
class Cors
{
    public function ReturnCorsHeader() 
    { 
       call_user_func(array($this,'CorsHandler'));    
    }

    private function CorsHandler()
    {
        header('Access-Control-Allow-Origin: '.$this->CorsHeaders()['allowed_origins'][0]);
        header('Access-Control-Allow-Methods: '.$this->CorsHeaders()['allowed_methods'][0]);
        header('Access-Control-Allow-Headers: '.$this->CorsHeaders()['allowed_headers'][0]);
        header('Access-Control-Max-Age: '.$this->CorsHeaders()['max_age'][0]);
        header('Cache-control: '.$this->CorsHeaders()['cache_control'][0]);
    }

    private function CorsHeaders()
    {
        return [  
            'paths' => ['api/*'],  
            'allowed_methods' => ['GET, POST, PUT, DELETE, OPTIONS'],
            'allowed_origins' => ['*'],
            'allowed_origins_patterns' => [],
            'allowed_headers' => ['*'],
            'exposed_headers' => [],
            'cache_control' => ['no-store, no-cache, must-revalidate, no-cache'],
            'max_age' => 0,
            'supports_credentials' => false,     
        ];
    }
}
?>