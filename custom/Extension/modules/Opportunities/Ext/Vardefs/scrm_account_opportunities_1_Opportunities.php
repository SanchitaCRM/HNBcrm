<?php
// created: 2019-03-09 06:32:04
$dictionary["Opportunity"]["fields"]["scrm_account_opportunities_1"] = array (
  'name' => 'scrm_account_opportunities_1',
  'type' => 'link',
  'relationship' => 'scrm_account_opportunities_1',
  'source' => 'non-db',
  'module' => 'scrm_account',
  'bean_name' => 'scrm_account',
  'vname' => 'LBL_SCRM_ACCOUNT_OPPORTUNITIES_1_FROM_SCRM_ACCOUNT_TITLE',
  'id_name' => 'scrm_account_opportunities_1scrm_account_ida',
);
$dictionary["Opportunity"]["fields"]["scrm_account_opportunities_1_name"] = array (
  'name' => 'scrm_account_opportunities_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_SCRM_ACCOUNT_OPPORTUNITIES_1_FROM_SCRM_ACCOUNT_TITLE',
  'save' => true,
  'id_name' => 'scrm_account_opportunities_1scrm_account_ida',
  'link' => 'scrm_account_opportunities_1',
  'table' => 'scrm_account',
  'module' => 'scrm_account',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Opportunity"]["fields"]["scrm_account_opportunities_1scrm_account_ida"] = array (
  'name' => 'scrm_account_opportunities_1scrm_account_ida',
  'type' => 'link',
  'relationship' => 'scrm_account_opportunities_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_SCRM_ACCOUNT_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
);
