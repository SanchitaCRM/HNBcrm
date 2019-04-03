<?php
 // created: 2019-03-23 13:44:02
$layout_defs["Users"]["subpanel_setup"]['users_scrm_loginaudit_1'] = array (
  'order' => 100,
  'module' => 'scrm_LoginAudit',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_USERS_SCRM_LOGINAUDIT_1_FROM_SCRM_LOGINAUDIT_TITLE',
  'get_subpanel_data' => 'users_scrm_loginaudit_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
