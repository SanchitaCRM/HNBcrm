<?php
 // created: 2019-02-18 09:22:13
$layout_defs["Users"]["subpanel_setup"]['users_scrm_loginlogout_1'] = array (
  'order' => 100,
  'module' => 'scrm_LoginLogout',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_USERS_SCRM_LOGINLOGOUT_1_FROM_SCRM_LOGINLOGOUT_TITLE',
  'get_subpanel_data' => 'users_scrm_loginlogout_1',
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
