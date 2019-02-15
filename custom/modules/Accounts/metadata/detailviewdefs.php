<?php
$viewdefs ['Accounts'] = 
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
          'AOS_GENLET' => 
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup();" value="{$APP.LBL_GENERATE_LETTER}">',
          ),
          4 => 
          array (
            'customCode' => '<input  type="submit" class="button" name="create" id="create" value="Create Account" onClick="document.location=\'index.php?module=Accounts&action=EditView&return_module=Accounts&return_action=DetailView\'">',
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'modules/Accounts/Account.js',
        ),
      ),
      'useTabs' => true,
      'tabDefs' => 
      array (
        'LBL_ACCOUNT_INFORMATION' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'comment' => 'Name of the Company',
            'label' => 'LBL_NAME',
            'displayParams' => 
            array (
            ),
          ),
          1 => 
          array (
            'name' => 'nic_c',
            'label' => 'LBL_NIC',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'pp_number_c',
            'label' => 'LBL_PP_NUMBER',
          ),
          1 => 
          array (
            'name' => 'dob_c',
            'label' => 'LBL_DOB',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'gender_c',
            'studio' => 'visible',
            'label' => 'LBL_GENDER',
          ),
          1 => 
          array (
            'name' => 'kyc_completed_c',
            'label' => 'LBL_KYC_COMPLETED',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'first_a_c_date_c',
            'label' => 'LBL_FIRST_A_C_DATE',
          ),
          1 => 
          array (
            'name' => 'occupation_c',
            'label' => 'LBL_OCCUPATION',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'product_holdings_c',
            'studio' => 'visible',
            'label' => 'LBL_PRODUCT_HOLDINGS',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'cross_up_sell_opportunities_c',
            'studio' => 'visible',
            'label' => 'LBL_CROSS_UP_SELL_OPPORTUNITIES',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'shipping_address_street',
            'label' => 'LBL_SHIPPING_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'shipping',
            ),
          ),
          1 => 
          array (
            'name' => 'billing_address_street',
            'label' => 'LBL_BILLING_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
            ),
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'mothers_maiden_name_c',
            'label' => 'LBL_MOTHERS_MAIDEN_NAME',
          ),
          1 => 
          array (
            'name' => 'priority_y_n_c',
            'label' => 'LBL_PRIORITY_Y_N',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'remarks_c',
            'studio' => 'visible',
            'label' => 'LBL_REMARKS',
          ),
          1 => 
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
