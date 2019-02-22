<?php
$module_name = 'scrm_LoginLogout';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'USERS_SCRM_LOGINLOGOUT_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_USERS_SCRM_LOGINLOGOUT_1_FROM_USERS_TITLE',
    'id' => 'USERS_SCRM_LOGINLOGOUT_1USERS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'IP_ADDRESS_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_IP_ADDRESS',
    'width' => '10%',
  ),
  'LOGOUT_TIME_C' => 
  array (
    'type' => 'datetimecombo',
    'default' => true,
    'label' => 'LBL_LOGOUT_TIME',
    'width' => '10%',
  ),
);
?>
