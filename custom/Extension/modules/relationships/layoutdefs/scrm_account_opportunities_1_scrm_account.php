<?php
 // created: 2019-03-09 06:32:04
$layout_defs["scrm_account"]["subpanel_setup"]['scrm_account_opportunities_1'] = array (
  'order' => 100,
  'module' => 'Opportunities',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_SCRM_ACCOUNT_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
  'get_subpanel_data' => 'scrm_account_opportunities_1',
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
