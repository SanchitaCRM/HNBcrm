<?php
 // created: 2019-02-18 10:07:56
$layout_defs["scrm_LoginLogout"]["subpanel_setup"]['scrm_loginlogout_scrm_loginhistory_1'] = array (
  'order' => 100,
  'module' => 'scrm_LoginHistory',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_SCRM_LOGINLOGOUT_SCRM_LOGINHISTORY_1_FROM_SCRM_LOGINHISTORY_TITLE',
  'get_subpanel_data' => 'scrm_loginlogout_scrm_loginhistory_1',
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
