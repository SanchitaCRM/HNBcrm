<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2019-02-18 09:22:13
$dictionary["scrm_LoginLogout"]["fields"]["users_scrm_loginlogout_1"] = array (
  'name' => 'users_scrm_loginlogout_1',
  'type' => 'link',
  'relationship' => 'users_scrm_loginlogout_1',
  'source' => 'non-db',
  'module' => 'Users',
  'bean_name' => 'User',
  'vname' => 'LBL_USERS_SCRM_LOGINLOGOUT_1_FROM_USERS_TITLE',
  'id_name' => 'users_scrm_loginlogout_1users_ida',
);
$dictionary["scrm_LoginLogout"]["fields"]["users_scrm_loginlogout_1_name"] = array (
  'name' => 'users_scrm_loginlogout_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_USERS_SCRM_LOGINLOGOUT_1_FROM_USERS_TITLE',
  'save' => true,
  'id_name' => 'users_scrm_loginlogout_1users_ida',
  'link' => 'users_scrm_loginlogout_1',
  'table' => 'users',
  'module' => 'Users',
  'rname' => 'name',
);
$dictionary["scrm_LoginLogout"]["fields"]["users_scrm_loginlogout_1users_ida"] = array (
  'name' => 'users_scrm_loginlogout_1users_ida',
  'type' => 'link',
  'relationship' => 'users_scrm_loginlogout_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_USERS_SCRM_LOGINLOGOUT_1_FROM_SCRM_LOGINLOGOUT_TITLE',
);


 // created: 2019-02-18 09:23:31
$dictionary['scrm_LoginLogout']['fields']['ip_address_c']['inline_edit']='1';
$dictionary['scrm_LoginLogout']['fields']['ip_address_c']['labelValue']='IP Address';

 

 // created: 2019-02-18 09:49:44
$dictionary['scrm_LoginLogout']['fields']['total_time_c']['inline_edit']='1';
$dictionary['scrm_LoginLogout']['fields']['total_time_c']['labelValue']='Total Time';

 

 // created: 2019-02-18 09:55:48
$dictionary['scrm_LoginLogout']['fields']['total_logins_per_day_c']['inline_edit']='1';
$dictionary['scrm_LoginLogout']['fields']['total_logins_per_day_c']['labelValue']='Total Logins Per Day';

 

// created: 2019-02-18 10:07:56
$dictionary["scrm_LoginLogout"]["fields"]["scrm_loginlogout_scrm_loginhistory_1"] = array (
  'name' => 'scrm_loginlogout_scrm_loginhistory_1',
  'type' => 'link',
  'relationship' => 'scrm_loginlogout_scrm_loginhistory_1',
  'source' => 'non-db',
  'module' => 'scrm_LoginHistory',
  'bean_name' => 'scrm_LoginHistory',
  'side' => 'right',
  'vname' => 'LBL_SCRM_LOGINLOGOUT_SCRM_LOGINHISTORY_1_FROM_SCRM_LOGINHISTORY_TITLE',
);

?>