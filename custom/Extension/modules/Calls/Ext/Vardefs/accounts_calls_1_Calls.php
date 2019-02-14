<?php
// created: 2019-02-14 08:51:45
$dictionary["Call"]["fields"]["accounts_calls_1"] = array (
  'name' => 'accounts_calls_1',
  'type' => 'link',
  'relationship' => 'accounts_calls_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_ACCOUNTS_CALLS_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_calls_1accounts_ida',
);
$dictionary["Call"]["fields"]["accounts_calls_1_name"] = array (
  'name' => 'accounts_calls_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_CALLS_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_calls_1accounts_ida',
  'link' => 'accounts_calls_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Call"]["fields"]["accounts_calls_1accounts_ida"] = array (
  'name' => 'accounts_calls_1accounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_calls_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_CALLS_1_FROM_CALLS_TITLE',
);
