<?php
$module_name = 'scrm_SMS_Workflow';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'MESSAGE_ID_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_MESSAGE_ID',
    'width' => '10%',
  ),
  'MESSAGE_STATUS_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_MESSAGE_STATUS',
    'width' => '10%',
  ),
  'MESSAGE_RECEIVER_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_MESSAGE_RECEIVER',
    'width' => '10%',
  ),
  'PARENT_NAME' => 
  array (
    'type' => 'parent',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_FLEX_RELATE',
    'link' => true,
    'sortable' => false,
    'ACLTag' => 'PARENT',
    'dynamic_module' => 'PARENT_TYPE',
    'id' => 'PARENT_ID',
    'related_fields' => 
    array (
      0 => 'parent_id',
      1 => 'parent_type',
    ),
    'width' => '10%',
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
?>
