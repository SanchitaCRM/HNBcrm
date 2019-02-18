<?php
// created: 2019-02-18 10:07:56
$dictionary["scrm_loginlogout_scrm_loginhistory_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'scrm_loginlogout_scrm_loginhistory_1' => 
    array (
      'lhs_module' => 'scrm_LoginLogout',
      'lhs_table' => 'scrm_loginlogout',
      'lhs_key' => 'id',
      'rhs_module' => 'scrm_LoginHistory',
      'rhs_table' => 'scrm_loginhistory',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'scrm_loginlogout_scrm_loginhistory_1_c',
      'join_key_lhs' => 'scrm_loginlogout_scrm_loginhistory_1scrm_loginlogout_ida',
      'join_key_rhs' => 'scrm_loginlogout_scrm_loginhistory_1scrm_loginhistory_idb',
    ),
  ),
  'table' => 'scrm_loginlogout_scrm_loginhistory_1_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'scrm_loginlogout_scrm_loginhistory_1scrm_loginlogout_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'scrm_loginlogout_scrm_loginhistory_1scrm_loginhistory_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'scrm_loginlogout_scrm_loginhistory_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'scrm_loginlogout_scrm_loginhistory_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'scrm_loginlogout_scrm_loginhistory_1scrm_loginlogout_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'scrm_loginlogout_scrm_loginhistory_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'scrm_loginlogout_scrm_loginhistory_1scrm_loginhistory_idb',
      ),
    ),
  ),
);