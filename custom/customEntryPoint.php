<?php 
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
//echo "Hello World!";
require_once('data/SugarBean.php');  
require_once('./include/SugarDateTime.php');  
global $db;
$bean = new SugarBean();
$due_date_time = new SugarDateTime();
$date_time = $due_date_time->asDb();
$query = 'SELECT date_entered FROM scrm_loginlogout';
$result1 = $bean->db->query($query);
$data = $bean->db->fetchByAssoc($result1);

foreach($data as $val){
  $sql = "INSERT INTO scrm_loginlogout_audit(id, parent_id, date_created, created_by, field_name, data_type, before_value_string, after_value_string, before_value_text, after_value_text) VALUES (3,1,'$val','admin',null,null,null,null,null,null)";
  $result = $bean->db->query($sql);
  $data1 = $bean->db->execute($result);
  echo "insert record";
}

?>