<?php 
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class LoginHook
{   
    function LoginDetails($bean, $event, $arguments) {	 
      $username = $bean->name;
      $userid = $bean->id;
      $ipaddress = $_SERVER['REMOTE_ADDR'];
      $timestamp = TimeDate::getInstance()->nowDb(); 
      $_SESSION['login_time'] = $timestamp;
      
      $login = new scrm_LoginLogout();
      $login->name = $username;
      $login->ip_address_c = $ipaddress;
      $login->assigned_user_id = $userid;
      $login->save();
      
      $login_relate = BeanFactory::getBean('scrm_LoginLogout', $login->id);
      $login_relate->users_scrm_loginlogout_1users_ida = $userid;
      $login_relate->users_scrm_loginlogout_1scrm_loginlogout_idb = $login->id;
      $login_relate->save();    
      $_SESSION['login_id'] = $login->id;
      
      $login_history = new scrm_LoginHistory();
      $login_history->name = $login->name;
      $login_history->id = $_SESSION['login_id'];
      $login_history->assigned_user_id = $login->assigned_user_id;
      $login_history->save();
      
      $login_history_relate = BeanFactory::getBean('scrm_LoginHistory', $_SESSION['login_id']);
      $login_history_relate->scrm_loginlogout_scrm_loginhistory_1scrm_loginlogout_ida = $_SESSION['login_id'];
      $login_history_relate->scrm_loginlogout_scrm_loginhistory_1scrm_loginhistory_idb = $_SESSION['login_id'];
      $login_history_relate->save();
      $_SESSION['login_his_id'] = $login->id;
    } 
}

?>
