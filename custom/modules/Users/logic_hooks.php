<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_login'] = Array(); 
$hook_array['after_login'][] = Array(1, 'SugarFeed old feed entry remover', 'modules/SugarFeed/SugarFeedFlush.php','SugarFeedFlush', 'flushStaleEntries'); 
$hook_array['after_login'][] = Array(2, 'Create Customer 360 Tab if not assigned', 'custom/modules/Users/Customer360TabAssign.php','Customer360TabAssign', 'assignCustomer360Tab'); 
$hook_array['after_delete'] = Array(); 


//$hook_array['after_login'][] = Array(77, 'Insert into scrm_loginlogout and scrm_loginlogout_cstm Table', 'custom/modules/scrm_LoginLogout/LoginLogout.php','LoginLogoutLogicHook', 'LoginLogout'); 
$hook_array['after_login'][] = Array(77, 'Insert into scrm_loginlogout and scrm_loginlogout_cstm Table', 'custom/modules/scrm_LoginLogout/LoginLogout.php','LoginLogoutLogicHook', 'InsertRecords'); 

$hook_array['after_logout'] = Array(); 
$hook_array['after_logout'][] = Array(1, 'Get Logout date', 'custom/modules/scrm_LoginLogout/LoginLogout.php','LoginLogoutLogicHook', 'CaptureLogoutTime');

?> 