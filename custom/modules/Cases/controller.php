<?php
if(!defined('sugarEntry')) define('sugarEntry', true);
/**
 *  @copyright SimpleCRM http://www.simplecrm.com.sg
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SimpleCRM <info@simplecrm.com.sg>
 */

require_once('include/entryPoint.php');
include('include/tcpdf/config/lang/eng.php');
include('include/tcpdf/config/tcpdf_config.php');
include('include/tcpdf/tcpdf.php');

class CasesController extends SugarController{

    /*
    Create Case record.
    Author     : Nitheesh.R <nitheesh@simplecrm.com.sg>
    Date       : April-10-2017
    php version : 5.6
    */
	public function action_create_records (){

		global $sugar_config; 
		global $db;

		$module             = $_REQUEST['module'];
		$action             = $_REQUEST['action'];
		$to_pdf             = $_REQUEST['to_pdf'];
		$case_name          = $_REQUEST['case_name'];
		$priority           = $_REQUEST['priority'];
		$twitter_handle_c   = $_REQUEST['twitter_handle_c'];
		$description        = $_REQUEST['description'];
		$case_status        = $_REQUEST['case_status'];	
		$status_id          = $_REQUEST['status_id'];
		$account_id         = $_REQUEST['account_id'];

		$case = new aCase();

		$case->name                    = $case_name;
		$case->status                  = $case_status;
		$case->description             = $description;  
		$case->tweet_id_c              = $status_id; 
		$case->twitter_handle_c        = $twitter_handle_c; 
		$case->priority                = $priority;
		$case->account_id              = $account_id;  

		$query1  =   "SELECT id_c FROM cases_cstm, cases WHERE id = id_c AND deleted = 0 AND  tweet_id_c  = '$status_id'";
		$value1  =   $db->query($query1);
		$check1  =   $get_values_row1  = $db->fetchByAssoc($value1);
    //print_r($check1); exit;

		if(!$check1){
			$case->save();	
			$created = "y";
		}
		if($check1){
			$created = "n";
		}

		$sql = "SELECT id_c FROM cases_cstm, cases WHERE id = id_c AND deleted = 0 AND  tweet_id_c  = '$status_id'";
		$result = $db->query($sql);

		if($row6 = $db->fetchByAssoc($result)){
			$id_c = $row6['id_c'];                    
      
		}

		$data2= array();
		$data2['id_c']                = $id_c;
		$data2['created']             = $created;

		echo json_encode($data2);
	}    


    /*
    Get fb data from Case record.
    Author     : Nitheesh.R <nitheesh@simplecrm.com.sg>
    Date       : April-10-2017
    php version : 5.6
    */
	function action_get_fb_data(){

		global $db;  

		$recordId= $_REQUEST['recordId']; 

		$selcect_value="SELECT * FROM cases, cases_cstm WHERE id=id_c  AND id='$recordId' AND deleted=0";
		$get_values_res=$db->query($selcect_value);			
		if($get_values_row=$db->fetchByAssoc($get_values_res))
		{
			$id                   = $get_values_row['id'];
			$case_name            = $get_values_row['name'];
			$case_source          = $get_values_row['source_c'];
			$posted_message_id    = $get_values_row['posted_message_id_c'];			
			$post_from_id         = $get_values_row['post_from_id_c'];			
			$post_from_first_name = $get_values_row['post_from_first_name_c']; 
			$post_from_last_name  = $get_values_row['post_from_last_name_c'];			
		}

		$data= array(); 

		$data['case_name']                = $case_name;
		$data['case_id']                  = $recordId;
		$data['case_source']              = $case_source;		
		$data['posted_message_id']        = $posted_message_id;
		$data['post_from_id']             = $post_from_id;
		$data['post_from_first_name']     = $post_from_first_name;
		$data['post_from_last_name']      = $post_from_last_name;

		echo json_encode($data);
	}
  

    public function action_displaypassedids()
    {
      $heading = '"Case Number", "Customer Name", "Priority", "State", "Status", "Type", "Ticket", "Description", "Resolution", "Assigned To", "Date Entered", "Date Modified"';
      $heading.= "\n";
  
      global $db; 
      $recordId = $_REQUEST['uid']; 
      $ids =  explode(",",$recordId);      
      $multiIds =  implode("', '",$ids);
      
      $sql = "SELECT c.*, a.name as c_name FROM cases c JOIN accounts a ON a.id = c.account_id WHERE c.id IN ('".$multiIds."')";
      $result = $db->query($sql);
      $i = 0;
      while ( $case = $db->fetchByAssoc($result) ) {
          $cases[] = $case;
          $heading.= $cases[$i]['case_number'].", ";
          $heading.= $cases[$i]['c_name'].", ";
          $heading.= ($cases[$i]['priority'] == "P1") ? "High".", " : ($cases[$i]['priority'] == "P2") ? "Medium".", " : ($cases[$i]['priority'] == "P3") ? "Low".", " : " ";
          $heading.= $cases[$i]['state'].", ";
          $heading.= ($cases[$i]['status'] == 'Open_New') ? "New".", " : ($cases[$i]['status'] == 'Open_Assigned') ? "Assigned".", " : ($cases[$i]['status'] == 'Open_Pending Input') ? "Pending Input".", " : ($cases[$i]['status'] == 'Closed_Closed') ? "Closed".", " : ($cases[$i]['status'] == 'Closed_Rejected') ? "Rejected".", " : ($cases[$i]['status'] == 'Closed_Rejected') ? "Duplicate".", " : " ";
          $heading.= ($cases[$i]['type'] == 'Minor_Defect') ? "Service Request".", " : ($cases[$i]['type'] == 'Change_Request') ? "Complaint".", " : ($cases[$i]['type'] == 'Pre_Sales_Related') ? "Query".", " : " ";
          $heading.= $cases[$i]['name'].", ";
          $heading.= $cases[$i]['description'].", ";
          $heading.= $cases[$i]['resolution'].", ";
          $heading.= $cases[$i]['assigned_user_id'] ? "Administrator".", " : "User".", ";
          $heading.= $cases[$i]['date_entered'].", ";
          $heading.= $cases[$i]['date_modified'];
          $heading.= "\n";
          $i++;
      }
          
      ob_clean();
      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=data.csv');
      echo $heading;
      exit;
    }

  
    public function action_generatePDF()
    {
        $record_id = $this->bean->id;
        $case_bean = BeanFactory::getBean('Cases', $record_id);
        
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('scrm');
        $pdf->SetTitle('Bank of Maharashtra');
        $pdf->SetSubject('Head Office');
        $pdf->SetKeywords('Operations Department');
        $pdf->SetFont('helvetica', '', 11, '', true);

        //$pdf->SetHeaderData(PDF_HEADER_LOGO, 180,$text1,$text2 );

        // set header and footer fonts````````````
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        //set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT);
        $pdf->SetFooterMargin(10);

        //set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        //set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //$this->Footer();
        $pdf->AddPage();
        
        $case_id = html_entity_decode($case_bean->id);
        $case_name = html_entity_decode($case_bean->name);
        $case_no = html_entity_decode($case_bean->case_number);
        $type = html_entity_decode($case_bean->type);
        $status = html_entity_decode($case_bean->status);
        $state = html_entity_decode($case_bean->state);

        $tbl = <<<EOD
         <div>
          <h4 align="center">Note for Sanction for reversal/payment of compensation to the complainant for <br/> Unauthorized Electronic Banking Transactions.</h4><br/>
          <table border="1">
            <tr>
              <th align="center" style="width:200px;">S.N.</th>
              <th align="center">Particulars</th>
              <th align="center">Remarks</th>
            </tr>
            <tr>
              <td align="center" style="width:200px;">1</td>
              <td>Case Name</td>
              <td>{$case_name}</td>
            </tr>
            <tr>
              <td align="center" style="width:200px;">2</td>
              <td>Case ID</td>
              <td>{$case_id}</td>
            </tr>
            <tr>
              <td align="center" style="width:200px;">3</td>
              <td>Type</td>
              <td>{$type}</td>
            </tr>
            <tr>
              <td align="center" style="width:200px;">4</td>
              <td>Case Number</td>
              <td>{$case_no}</td>
            </tr>
             <tr>
              <td align="center" style="width:200px;">5</td>
              <td>Status</td>
              <td>{$status}</td>
            </tr>
            <tr>
              <td align="center" style="width:200px;">6</td>
              <td>State</td>
              <td>{$state}</td>
            </tr>
          </table>
        </div>
EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');
        ob_clean();
        $pdf->Output("download.pdf",'F');
        $pdf->Output();
    }
} 
