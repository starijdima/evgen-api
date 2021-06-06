<?php

 /*
 |--------------------------------------------------------------------------
 | Файл маршрутизации
 |--------------------------------------------------------------------------
 */

namespace SDFramework\Routes;
$route->before('GET', '/.*', function() {
  //
 });
$route->get('/', function() {
  echo \SDFramework\Controllers\DefaultController::welcome();
});
//GET FIELD FROM TABLE BY FIELD_VALUE
$route->get('/api/get:(\w+)/from:(\w+)', function($field, $table) {
  echo \SDFramework\Controllers\DefaultController::get_req($field, $table);
});

$route->get('/api/get:(\w+)/from:(\w+)/id:(\w+)', function($field, $table, $id) {
  echo \SDFramework\Controllers\DefaultController::get_user($field, $table,  $id);
});

$route->post('/api/post_request', function() {
  echo \SDFramework\Controllers\DefaultController::post_request();
});

$route->post('/api/change_req', function() {
  echo \SDFramework\Controllers\DefaultController::change_req();
});

$route->post('/api/delete_req', function() {
  echo \SDFramework\Controllers\DefaultController::delete_req();
});



?>