<?php 
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class LogoutHook
{       
    function LogoutDetails($bean, $event, $arguments){     
        //echo "Sanchita Samrit"; 
        //echo "<pre>"; print_r($bean); exit;
        //print_r($_SESSION); exit;
        //$logout = BeanFactory::retrieveBean('scrm_LoginLogout', $_SESSION['login_id']);
        //print_r($logout); exit;
    }
}

?>
