<?php
// created: 2017-07-18 21:10:59
$viewdefs['Cases']['EditView'] = array (
  'templateMeta' => 
  array (
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
    'includes' => 
    array (
      0 => 
      array (
        'file' => 'include/javascript/bindWithDelay.js',
      ),
      1 => 
      array (
        'file' => 'modules/AOK_KnowledgeBase/AOK_KnowledgeBase_SuggestionBox.js',
      ),
      2 => 
      array (
        'file' => 'include/javascript/qtip/jquery.qtip.min.js',
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
    'form' => 
    array (
      'enctype' => 'multipart/form-data',
    ),
  ),
  'panels' => 
  array (
    'lbl_case_information' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'case_number',
          'type' => 'readonly',
        ),
        1 => 'priority',
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'state',
          'comment' => 'The state of the case (i.e. open/closed)',
          'label' => 'LBL_STATE',
        ),
        1 => 'status',
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'region_c',
          'studio' => 'visible',
          'label' => 'LBL_REGION',
        ),
        1 => 
        array (
          'name' => 'country_c',
          'studio' => 'visible',
          'label' => 'LBL_COUNTRY',
        ),
      ),
      3 => 
      array (
        0 => 'type',
        1 => 'account_name',
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'name',
          'displayParams' => 
          array (
          ),
        ),
        1 => '',
      ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'description',
        ),
        1 => 
        array (
          'name' => 'resolution',
          'nl2br' => true,
        ),
      ),
      6 => 
      array (
        0 => 
        array (
          'name' => 'source_c',
          'studio' => 'visible',
          'label' => 'LBL_SOURCE',
        ),
        1 => 
        array (
          'name' => 'contacts_cases_1_name',
        ),
      ),
      7 => 
      array (
        0 => 'assigned_user_name',
        1 => '',
      ),
    ),
  ),
);