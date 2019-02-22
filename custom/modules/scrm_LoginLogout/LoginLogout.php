<?php 
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class LoginLogoutLogicHook
{
    static $already_ran = false;
    
    function LoginLogout($bean, $event, $arguments) {	  
      if(self::$already_ran == true) return;
      self::$already_ran = true;

      $bean->name = ucwords($bean->name);
      $bean->ip_address_c = $_SERVER['REMOTE_ADDR'];
    }
  
    function InsertRecords($bean, $event, $arguments) {
      if(self::$already_ran == true) return;
      self::$already_ran = true;
      global $current_user, $db;
      $current_user->ip_address_c = $_SERVER['REMOTE_ADDR'];
      $guid = '';
      $guid = create_guid();
      $timestamp = TimeDate::getInstance()->nowDb();
      $date = date("d-m-Y");
      $name = ucwords($current_user->name)." - ".$date;
      
      $sql = "INSERT INTO scrm_loginlogout(id, name, date_entered, date_modified, modified_user_id, created_by, deleted, assigned_user_id)
      VALUES ('".$guid."', '".$name."', '".$timestamp."', '".$timestamp."', '".$current_user->id."', '".$current_user->id."', '0', '".$current_user->id."')";
      $db->query($sql);
      
      $sql1 = "INSERT INTO scrm_loginlogout_cstm(id_c, ip_address_c, total_time_c, total_logins_per_day_c, logout_time_c)
      VALUES ('".$guid."', '".$current_user->ip_address_c."', '0', '0', '0000-00-00 00:00:00')";
      //print_r($sql1); exit;
      $db->query($sql1);

      //$sql2 = "UPDATE users_scrm_loginlogout_1_c SET id='".$guid."', date_modified='".$timestamp."', deleted='0' WHERE id='".$current_user->id."'";
      $sql2 = "INSERT INTO `users_scrm_loginlogout_1_c`(`id`, `date_modified`, `deleted`, `users_scrm_loginlogout_1users_ida`, `users_scrm_loginlogout_1scrm_loginlogout_idb`)
      VALUES ('".$guid."','".$timestamp."','0','".$guid."','null')";
      $db->query($sql2); 
  }
  
  function CaptureLogoutTime($bean, $event, $arguments) {
      if(self::$already_ran == true) return;
      self::$already_ran = true;
      global $current_user, $db;   
      $timestamp = TimeDate::getInstance()->nowDb();
      $query = "UPDATE scrm_loginlogout login
                INNER JOIN scrm_loginlogout_cstm custom ON login.id = custom.id_c
                SET custom.logout_time_c = '".$timestamp."'
                WHERE login.assigned_user_id = custom.id_c";
      $db->query($query);  
    

      $query1 = "SELECT TIMESTAMPDIFF(MINUTE, login.date_entered, custom.logout_time_c) AS res FROM scrm_loginlogout login
      LEFT JOIN scrm_loginlogout_cstm custom ON login.id = custom.id_c WHERE login.assigned_user_id = custom.id_c";   
      $data = $db->query($query1);
      $results = $db->fetchByAssoc($data);
      $totalLoginTime = date('H:i:s', mktime(0,$results['res']));
      
    
      /* $q = "UPDATE scrm_loginlogout_cstm custom 
      INNER JOIN users_scrm_loginlogout_1_c login ON custom.id_c = login.id
      SET custom.total_time_c = '".$loginTime."'
      WHERE login.users_scrm_loginlogout_1users_ida = custom.id_c"; */
    
      $q = "UPDATE scrm_loginlogout_cstm custom 
      INNER JOIN users_scrm_loginlogout_1_c login ON custom.id_c = login.id
      INNER JOIN scrm_loginlogout log ON log.date_entered = login.date_modified
      SET custom.total_time_c = '".$totalLoginTime."'
      WHERE login.users_scrm_loginlogout_1users_ida = custom.id_c AND log.id = login.id";
    //print_r($q); exit;
      $db->query($q);
  }

   
}

?>











