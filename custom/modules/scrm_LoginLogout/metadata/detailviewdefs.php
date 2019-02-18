<?php
$module_name = 'scrm_LoginLogout';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'users_scrm_loginlogout_1_name',
            'label' => 'LBL_USERS_SCRM_LOGINLOGOUT_1_FROM_USERS_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 'date_entered',
          1 => 
          array (
            'name' => 'total_time_c',
            'label' => 'LBL_TOTAL_TIME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'ip_address_c',
            'label' => 'LBL_IP_ADDRESS',
          ),
          1 => 
          array (
            'name' => 'total_logins_per_day_c',
            'label' => 'LBL_TOTAL_LOGINS_PER_DAY',
          ),
        ),
      ),
    ),
  ),
);
?>
