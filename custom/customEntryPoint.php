<?php 
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
//echo "Hello World!"; //exit;
/* require_once('data/SugarBean.php');  
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
} */

//http://3.0.58.106/SimpleCRM2/index.php?entryPoint=customEntryPoint

require_once('data/SugarBean.php');
global $db;

$bean = new SugarBean();
$sql = 'SELECT count(*) as service_req FROM cases WHERE deleted = 0 and type = "Minor_Defect"';
$result = $bean->db->query($sql);
$serviceRequest = $bean->db->fetchByAssoc($result);

$sql1 = 'SELECT count(*) as complaint FROM cases WHERE deleted = 0 and type = "Change_Request"';
$result1 = $bean->db->query($sql1);
$complaint = $bean->db->fetchByAssoc($result1);

$sql2 = 'SELECT count(*) as query FROM cases WHERE deleted = 0 and type = "Pre_Sales_Related"';
$result2 = $bean->db->query($sql2);
$query = $bean->db->fetchByAssoc($result2);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Custom Report</title>
  </head>
  <body>
    <div class="container">
      <h3 class="text-center">Custom Report</h3>
      </br></br>
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <table class="table table-responsive table-bordered">
        <thead>
          <tr>
              <th class="text-center">Sr. No.</th>
              <th class="text-center">Type of Ticket</th>
              <th class="text-center">Number</th>
          </tr>
        </thead>
        <tbody>
          <tr class="success text-center">
              <td>1</td>
              <td>Service Request</td>
              <td><?php echo $serviceRequest['service_req']; ?></td>
          </tr>
          <tr class="info text-center">
              <td>2</td>
              <td>Complaint</td>
              <td><?php echo $complaint['complaint']; ?></td>
          </tr>
          <tr class="warning text-center">
              <td>3</td>
              <td>Query</td>
              <td><?php echo $query['query']; ?></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="col-md-2"></div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>









