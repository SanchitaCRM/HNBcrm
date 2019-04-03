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

$hook_array['after_login'][] = Array(3, 'Insert into custom Table', 'custom/modules/Users/LoginAudit.php','LoginHook', 'LoginDetails'); 
$hook_array['after_logout'] = Array(); 
$hook_array['after_logout'][] = Array(1, 'Get Logout datetime', 'custom/modules/Users/LogoutAudit.php','LogoutHook', 'LogoutDetails');

//$hook_array['after_login'][] = Array(3, 'Insert into custom Table', 'custom/modules/Users/LoginDetails.php','LoginLogoutLogicHook', 'UserDetails'); 
//$hook_array['after_logout'][] = Array(1, 'Get Logout datetime', 'custom/modules/Users/LoginDetails.php','LoginLogoutLogicHook', 'CaptureLogoutTime');

?>