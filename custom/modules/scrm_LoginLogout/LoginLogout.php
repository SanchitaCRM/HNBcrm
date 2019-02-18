<?php 
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class LoginLogoutLogicHook
{
    function LoginLogout($bean, $event, $arguments)
    {	
      global $db, $current_user;
      $id = $bean->id;
      print_r($id); echo "<br>";
      $userid = $current_user->id;
      print_r($userid); echo "<br>";
      $module = $_REQUEST['module'];
      print_r($module); exit;
      $rc = BeanFactory::getBean('scrm_Retail_Customer',$id);
      
    	$bean->name = ucwords($bean->name);
    	//$bean->ip_address_c = $_SERVER['REMOTE_ADDR'];
    }

}


?>