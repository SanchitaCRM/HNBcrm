<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2019-02-14 08:51:45
$layout_defs["Accounts"]["subpanel_setup"]['accounts_calls_1'] = array (
  'order' => 100,
  'module' => 'Calls',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_CALLS_1_FROM_CALLS_TITLE',
  'get_subpanel_data' => 'accounts_calls_1',
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



/*Custom remove subpanels*/
unset($layout_defs['Accounts']['subpanel_setup']['project']);

// unset($layout_defs['Accounts']['subpanel_setup']['opportunities']);

unset($layout_defs['Accounts']['subpanel_setup']['campaigns']);

unset($layout_defs['Accounts']['subpanel_setup']['accounts']);

unset($layout_defs['Accounts']['subpanel_setup']['account_aos_quotes']);

unset($layout_defs['Accounts']['subpanel_setup']['account_aos_invoices']);

unset($layout_defs['Accounts']['subpanel_setup']['account_aos_contracts']);

unset($layout_defs['Accounts']['subpanel_setup']['products_services_purchased']);


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['account_aos_contracts']['override_subpanel_name'] = 'Account_subpanel_account_aos_contracts';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['account_aos_invoices']['override_subpanel_name'] = 'Account_subpanel_account_aos_invoices';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['account_aos_quotes']['override_subpanel_name'] = 'Account_subpanel_account_aos_quotes';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['accounts']['override_subpanel_name'] = 'Account_subpanel_accounts';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['bugs']['override_subpanel_name'] = 'Account_subpanel_bugs';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['campaigns']['override_subpanel_name'] = 'Account_subpanel_campaigns';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['cases']['override_subpanel_name'] = 'Account_subpanel_cases';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['contacts']['override_subpanel_name'] = 'Account_subpanel_contacts';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['documents']['override_subpanel_name'] = 'Account_subpanel_documents';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['leads']['override_subpanel_name'] = 'Account_subpanel_leads';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['project']['override_subpanel_name'] = 'Account_subpanel_project';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['securitygroups']['override_subpanel_name'] = 'Account_subpanel_securitygroups';


//auto-generated file DO NOT EDIT
$layout_defs['Accounts']['subpanel_setup']['opportunities']['override_subpanel_name'] = 'Account_subpanel_opportunities';

?>