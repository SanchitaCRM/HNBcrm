<?php
$viewdefs ['Opportunities'] = 
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
          4 => 
          array (
            'customCode' => '<input  type="submit" class="button" name="create" id="create" value="Create Opportunity" onClick="document.location=\'index.php?module=Opportunities&action=EditView&return_module=Opportunities&return_action=DetailView\'">',
          ),
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
        'LBL_PANEL_ASSIGNMENT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 'account_name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'amount',
            'label' => '{$MOD.LBL_AMOUNT} ({$CURRENCY})',
          ),
          1 => 'date_closed',
        ),
        2 => 
        array (
          0 => 'sales_stage',
          1 => 'opportunity_type',
        ),
        3 => 
        array (
          0 => 'probability',
          1 => 'lead_source',
        ),
        4 => 
        array (
          0 => 'next_step',
          1 => 'campaign_name',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'actual_date_closed_c',
            'label' => 'LBL_ACTUAL_DATE_CLOSED',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'date_lost_c',
            'label' => 'LBL_DATE_LOST_C',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'nl2br' => true,
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'reason_for_lost_c',
            'studio' => 'visible',
            'label' => 'LBL_REASON_FOR_LOST',
          ),
          1 => 
          array (
            'name' => 'scrm_account_opportunities_1_name',
          ),
        ),
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
        ),
      ),
    ),
  ),
);
?>
