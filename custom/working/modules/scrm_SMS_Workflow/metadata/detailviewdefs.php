<?php
$module_name = 'scrm_SMS_Workflow';
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
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'parent_name',
            'studio' => 'visible',
            'label' => 'LBL_FLEX_RELATE',
          ),
          1 => 
          array (
            'name' => 'message_id_c',
            'label' => 'LBL_MESSAGE_ID',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'message_status_c',
            'label' => 'LBL_MESSAGE_STATUS',
          ),
          1 => 
          array (
            'name' => 'message_receiver_c',
            'label' => 'LBL_MESSAGE_RECEIVER',
          ),
        ),
        3 => 
        array (
          0 => 'description',
        ),
        4 => 
        array (
          0 => 'date_entered',
          1 => 'date_modified',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'contacts_scrm_sms_workflow_1_name',
          ),
        ),
      ),
    ),
  ),
);
?>
