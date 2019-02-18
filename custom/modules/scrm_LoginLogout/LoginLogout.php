<?php 
ini_set('display_errors', 1);
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class LoginLogoutLogicHook
{
    function LoginLogout($bean, $event, $arguments) {	
      global $db;
      $query = 'select * from scrm_loginlogout';
      print_r($query);
      $data = $db->query($query);
      $data = $db->fetchByAssoc($data);
      print_r($data);
      
    	$bean->name = ucwords($bean->name);
    	$bean->ip_address_c = $_SERVER['REMOTE_ADDR'];
    }

}


?>