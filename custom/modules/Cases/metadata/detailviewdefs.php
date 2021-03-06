<?php
$viewdefs ['Cases'] = 
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
            'customCode' => '<input type="submit" class="button" name="create" id="create" value="Create Case" onClick="document.location=\'index.php?module=Cases&action=EditView&return_module=Cases&return_action=DetailView\'">',
          ),
          5 => 
          array (
            'customCode' => '<input type="submit" class="button" name="getpdf" id="getpdf" value="Print PDF" onClick="window.location=\'index.php?module=Cases&action=generatePDF&record={$bean->id}\'">',
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
        'LBL_CASE_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_case_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_SUBJECT',
          ),
          1 => 'priority',
        ),
        1 => 
        array (
          0 => 'type',
          1 => 'status',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'state',
            'comment' => 'The state of the case (i.e. open/closed)',
            'label' => 'LBL_STATE',
          ),
          1 => 'account_name',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'suggestion_box',
            'label' => 'LBL_SUGGESTION_BOX',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'customCode' => '{$fields.description.value|html_entity_decode}',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 'resolution',
        ),
        6 => 
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
