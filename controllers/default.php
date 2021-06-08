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
  


   public static function new_issue()
   {
      $db = (new Database())->ORM;
      $data = $_POST;

      $issue = $db->dispense('issues');
      
      $issue->id_issue = $data['id_issue'];
      $issue->id_category = $data['id_category'];
      $issue->title = $data['title'];
      $issue->description = $data['description'];
      $issue->priority = $data['priority'];
      $issue->create_date = $data['create_date'];
      $issue->resolve_date = $data['resolve_date'];
      $issue->id_status = $data['id_status'];
      $issue->id_user = $data['id_user'];
      $issue->user_mail = $data['user_mail'];
      $issue->id_group = $data['id_group'];
    
      // Сохраняем объект
      $db->store($issue);

      return json_encode($data);
   }

   public static function send_mail()
   {
      $db = (new Database())->ORM;
      $data = $_POST;

      $issue = $db->dispense('issues');
      
      $id = $data['id'];
      $issue = $db->load('issues', $id);
      $issue->back_form = $data['back_form'];
    
      // Сохраняем объект
      $db->store($issue);

      return json_encode($data);
   }


   public static function save_changes()
   {
      $db = (new Database())->ORM;
      $data = $_POST;

      $issue = $db->dispense('issues');
      
      $id = $data['id'];
      $issue = $db->load('issues', $id);
      $issue->title = $data['title'];
      $issue->user_mail = $data['user_mail'];
      $issue->description = $data['description'];
      $issue->id_category = $data['id_category'];
      $issue->priority = $data['priority'];
      
    
      // Сохраняем объект
      $db->store($issue);

      return json_encode($data);
   }

   public static function test()
   {
      $db = (new Database())->ORM;
      $data = $_POST;

      $test = $db->dispense('test');
      
      $test->test = $data['test'];
      
    

   
      // Сохраняем объект
      $db->store($test);

      return json_encode($data);
   }



   public static function change_req()
   {
      $db = (new Database())->ORM;
      $data = $_POST;
      $id = $data['id'];
      $issues = $db->load('issues', $id);
      $issues->is_admin = $data['is_admin'];
      $issues->id_status = $data['id_status'];
      $issues->admin_mail = $data['admin_mail'];
    
      
      // Сохраняем объект
      $db->store($issues);

      return json_encode($data);
   }

   public static function delete_req()
   {
      $db = (new Database())->ORM;
      $data = $_POST;

      $id = $data['id'];
      $issues = $db->load('issues', $id);
      $db->trash($issues);

      return json_encode($data);
   }

  
}
?>