<?php
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
