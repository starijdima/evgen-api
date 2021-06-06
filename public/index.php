<?php 
ini_set('max_execution_time', 100000);
/*
Центральный файл доступа
*/
$loader = require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../vendor/engine/App.php';
$app->run();
?>