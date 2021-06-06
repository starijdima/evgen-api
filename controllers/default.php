<?php 
namespace SDFramework\Controllers;
use SDFramework\Controller;
use \SDFramework\Database;
use SDFramework\Environment;
use SDFramework\ExceptionHandler;
class DefaultController
{
   /**
    * welcome
    * Главная страница
    * @return void
    */
   public static function welcome()
   {
    return '
    <head>
    <link type="text/css" rel="stylesheet" href="/style.css">
    <div class="wrapper">
       <span>API IS WORKED</span>
    </div>';
   }

   /**
    * col_get_between
    * Выводит данные 
    * @param mixed $id
    * @param mixed $field
    * @return void
    */
 

   /**
    * col_get_by
    * Выводит данные 
    * @param mixed $id
    * @param mixed $field
    * @return void
    */
   public static function get_req($field, $table)
   {
      $db = (new Database())->ORM;
      $f = $field;
      if($field == "all") $f = '*';
      $data = $db->getAll('SELECT '.$f.' FROM '.$table);

      return json_encode($data);
   }

   public static function get_user($field, $table, $id)
   {
      $db = (new Database())->ORM;
      $f = $field;
      if($field == "all") $f = '*';
      if($id=="0"){
         $data = $db->getAll('SELECT '.$f.' FROM '.$table);
      }
      else{
         $data = $db->getAll('SELECT '.$f.' FROM '.$table.' WHERE id='.$id);
      }
   
      
      return json_encode($data);
   }
   /**
    * turn_stat_refactor
    * Рефакторинг таблицы turn_stat в нормальный вид с исправлением типов данных дат
    * @return void
    */
  


   public static function post_request()
   {
      $db = (new Database())->ORM;
      $data = $_POST;

      // Указываем, что будем работать с таблицей users
      $users = $db->dispense('users');
      // Заполняем объект свойствами
      $users->login = $data['login'];
      $users->password = $data['password'];
      $users->email = $data['email'];
      $users->f_name = $data['f_name'];
      $users->s_name = $data['s_name'];
      $users->t_name = $data['t_name'];
      $users->user_post = $data['user_post'];
      $users->user_state = $data['user_state'];
      $users->secure = 0;

   
      // Сохраняем объект
      $db->store($users);

      return json_encode($data);
   }

   public static function change_req()
   {
      $db = (new Database())->ORM;
      $data = $_POST;
      
     

      $id = $data['id'];
      // Загружаем объект с ID
      $users = $db->load('users', $id);
      // Обращаемся к свойству объекта и назначаем ему новое значение
      $users->user_state = $data['user_state'];
      $users->secure = $data['secure'];
      
      // Сохраняем объект
      $db->store($users);

      return json_encode($data);
   }

   public static function delete_req()
   {
      $db = (new Database())->ORM;
      $data = $_POST;

      $id = $data['id'];
      $users = $db->load('users', $id);
      $db->trash($users);

      return json_encode($data);
   }

  
}
?>