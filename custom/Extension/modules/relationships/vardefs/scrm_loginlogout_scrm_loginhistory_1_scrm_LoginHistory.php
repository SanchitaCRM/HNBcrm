<?php
// created: 2019-02-18 10:07:56
$dictionary["scrm_LoginHistory"]["fields"]["scrm_loginlogout_scrm_loginhistory_1"] = array (
  'name' => 'scrm_loginlogout_scrm_loginhistory_1',
  'type' => 'link',
  'relationship' => 'scrm_loginlogout_scrm_loginhistory_1',
  'source' => 'non-db',
  'module' => 'scrm_LoginLogout',
  'bean_name' => 'scrm_LoginLogout',
  'vname' => 'LBL_SCRM_LOGINLOGOUT_SCRM_LOGINHISTORY_1_FROM_SCRM_LOGINLOGOUT_TITLE',
  'id_name' => 'scrm_loginlogout_scrm_loginhistory_1scrm_loginlogout_ida',
);
$dictionary["scrm_LoginHistory"]["fields"]["scrm_loginlogout_scrm_loginhistory_1_name"] = array (
  'name' => 'scrm_loginlogout_scrm_loginhistory_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SCRM_LOGINLOGOUT_SCRM_LOGINHISTORY_1_FROM_SCRM_LOGINLOGOUT_TITLE',
  'save' => true,
  'id_name' => 'scrm_loginlogout_scrm_loginhistory_1scrm_loginlogout_ida',
  'link' => 'scrm_loginlogout_scrm_loginhistory_1',
  'table' => 'scrm_loginlogout',
  'module' => 'scrm_LoginLogout',
  'rname' => 'name',
);
$dictionary["scrm_LoginHistory"]["fields"]["scrm_loginlogout_scrm_loginhistory_1scrm_loginlogout_ida"] = array (
  'name' => 'scrm_loginlogout_scrm_loginhistory_1scrm_loginlogout_ida',
  'type' => 'link',
  'relationship' => 'scrm_loginlogout_scrm_loginhistory_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SCRM_LOGINLOGOUT_SCRM_LOGINHISTORY_1_FROM_SCRM_LOGINHISTORY_TITLE',
);
