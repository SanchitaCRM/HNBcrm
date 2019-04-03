<?php
$GLOBALS['app_list_strings']['type_list']=array (
  'Hot' => 'Hot',
  'Warm' => 'Warm',
  'Cold' => 'Cold',
);
$app_strings['LBL_GROUPTAB3_1440738985'] = 'Sales';

$app_strings['LBL_GROUPTAB4_1440738985'] = 'Marketing';
$app_list_strings['moduleList']['Leads']='Leads';
$app_list_strings['moduleListSingular']['Leads']='Lead';
$app_list_strings['record_type_display']['Leads']='Lead';
$app_list_strings['parent_type_display']['Leads']='Lead';
$app_list_strings['record_type_display_notes']['Leads']='Lead';
$GLOBALS['app_list_strings']['source_list']=array (
  '' => '',
  'Facebook' => 'Facebook',
  'Twitter' => 'Twitter',
  'Portal' => 'Portal',
  'Call' => 'Call',
  'Inbound_Email' => 'Inbound Email',
);
$GLOBALS['app_list_strings']['approval_status_dom']=array (
  '' => '',
  'Not Approved' => 'Not Approved',
  'Pending_Approval' => 'Pending Approval',
  'Approved' => 'Approved',
);
$app_list_strings['moduleList']['Reminders']='Reminders';
$app_list_strings['moduleList']['Reminders_Invitees']='Reminders Invitees';
$app_list_strings['moduleList']['scrm_Escalation_Matrix']='Escalation Matrix';
$app_list_strings['moduleList']['scrm_Escalation_Audit']='Escalation Audit';
$app_list_strings['moduleList']['scrm_Partner_Contacts']='Partner Contacts';
$app_list_strings['moduleList']['scrm_Partners']='Partners';




#$GLOBALS['app_list_strings']['teams_list']=array (
#  '' => '',
#  'Support_Group' => 'Support Group',
#  'Sales_Group' => 'Sales Group',
#);
$new_teams_array=array(
   ''=>'',
);
$db = DBManagerFactory::getInstance(); 
$result=$db->query("select id, name from securitygroups where deleted='0'");
while($row=$db->fetchRow($result)){$new_teams_array[$row['id']] = $row['name'];}
$GLOBALS['app_list_strings']['teams_list']=$new_teams_array; 




$GLOBALS['app_list_strings']['escalation_level_list']=array (
  '' => '',
  'Level1' => 'Level 1',
  'Level2' => 'Level 2',
  'Level3' => 'Level 3',
);
$GLOBALS['app_list_strings']['escalation_minutes_level1_list']=array (
  '' => '',
  5 => '5',
  10 => '10',
  15 => '15',
  30 => '30',
  45 => '45',
  60 => '60',
);
$GLOBALS['app_list_strings']['escalation_minutes_level2_c_list']=array (
  '' => '',
  10 => '10',
  15 => '15',
  30 => '30',
  45 => '45',
  60 => '60',
);

/*
$GLOBALS['app_list_strings']['email_template_1_list']=array (
  '' => '',
  'Update_Custome' => 'Update Customer on the Issue',
  'Quote_Price' => 'Quote Price Negotiation',
  'Quote_Approved' => 'Quote Approved',
  'Quote_Not_Approved' => 'Quote Not Approved',
  'New_Quote' => 'New Quote for Approval',
  'Welcome_To_SimpleWorks' => 'Welcome To SimpleWorks',
  'Deadline_missed' => 'Deadline missed',
  'Case_Closure' => 'Case Closure',
  'Joomla_Account' => 'Joomla Account Creation',
  'Case_Creation' => 'Case Creation',
  'Contact_Case' => 'Contact Case Update',
  'User_Case_Update' => 'User Case Update',
  'System_password' => 'System-generated password email',
  'Forgot_Password_email' => 'Forgot Password email',
  'Event_Invite_Template' => 'Event Invite Template',
);
*/

$new_email_templates_array=array(
   ''=>'',
);
$db = DBManagerFactory::getInstance(); 
$result=$db->query("select id, name from email_templates where deleted='0'");
while($row=$db->fetchRow($result)){$new_email_templates_array[$row['id']] = $row['name'];}
$GLOBALS['app_list_strings']['email_template_1_list']=$new_email_templates_array; 




$GLOBALS['app_list_strings']['country_list']=array (
  '' => '',
);
$GLOBALS['app_list_strings']['state_list']=array (
  '' => '',
  'Maharashta' => 'Maharashtra',
);
$GLOBALS['app_list_strings']['city_c_list']=array (
  '' => '',
  'Mumbai' => 'Mumbai',
);
$GLOBALS['app_list_strings']['quarter_list']=array (
  '' => '',
  1 => 'Q1',
  2 => 'Q2',
  3 => 'Q3',
  4 => 'Q4',
);

$GLOBALS['app_list_strings']['role1_0']=array (
  '' => '',
  'Marketing Manager' => 'Marketing Manager',
  'Support Rep' => 'Support Rep',
  'Support Manager' => 'Support Manager',
  'Sales Manager' => 'Sales Manager',
  'Sales Rep' => 'Sales Rep',
);

$GLOBALS['app_list_strings']['lead_simplecrm_status_list']=array (
  '' => '',
  'In_Review' => 'In Review',
  'Qualified' => 'Qualified',
  'Not_Qualified' => 'Not Qualified',
);
$GLOBALS['app_list_strings']['lead_partner_status_list']=array (
  '' => '',
  'In_Review' => 'In Review',
  'Accepted' => 'Accepted',
  'Rejected' => 'Rejected',
);
$GLOBALS['app_list_strings']['status_list']=array (
  '' => '',
  'New' => 'New',
  'Open' => 'Open - Close in 1 Month',
  'Open3' => 'Open - Close in 3 Month',
  'Open6' => 'Open - Close in 6 Month',
  'Converted' => 'Converted to Customer',
  'Dead' => 'Dead',
);
/* $GLOBALS['app_list_strings']['case_type_dom']=array (
  'Minor_Defect' => 'Service Request',
  'Defect' => 'Claim',
  'Change_Request' => 'Complaint',
  'Product_Enhancement_Request' => 'General Feedback',
  'Pre_Sales_Related' => 'Pre Sales Related',
  'Other' => 'Other',
); */

$GLOBALS['app_list_strings']['case_type_dom']=array (
  'Minor_Defect' => 'Service Request',
  'Change_Request' => 'Complaint',
  'Pre_Sales_Related' => 'Query',
);

$GLOBALS['app_list_strings']['type_0']=array (
  'HL' => 'Home Loan',
  'CL' => 'Car Loan',
  'SL' => 'Student Loan',
);

$GLOBALS['app_list_strings']['loan_type_list']=array (
  '' => '',
  'HL' => 'Home Loan',
  'CL' => 'Car Loan',
  'SL' => 'Student Loan',
);

$GLOBALS['app_list_strings']['category_list']=array (
  'Hot' => 'Hot',
  'Warm' => 'Warm',
);
$GLOBALS['app_list_strings']['region_list']=array (
  '' => '',
  'Asia' => 'Asia',
  'Europe' => 'Europe',
  'Africa' => 'Africa',
);
$GLOBALS['app_list_strings']['country_0']=array (
  '' => '',
  'Asia_China' => 'China',
  'Asia_India' => 'India',
  'Asia_Iraq' => 'Iraq',
  'Asia_SaudiArabia' => 'Saudi Arabia',
  'Asia_Turkey' => 'Turkey',
  'Europe_Ukraine' => 'Ukraine',
  'Europe_Italy' => 'Italy',
  'Europe_Spain' => 'Spain',
  'Europe_England' => 'England',
  'Africa_SouthAfrica' => 'South Africa',
);

$GLOBALS['app_list_strings']['account_type_dom']=array (
  '' => '',
  'Analyst' => 'Analyst',
  'Competitor' => 'Competitor',
  'Customer' => 'Customer',
  'Integrator' => 'Integrator',
  'Investor' => 'Investor',
  'Partner' => 'Partner',
  'Press' => 'Press',
  'Prospect' => 'Prospect',
  'Reseller' => 'Reseller',
  'Other' => 'Other',
);
$GLOBALS['app_list_strings']['lead_source_dom']=array (
  '' => '',
  'Cold Call' => 'Cold Call',
  'Existing Customer' => 'Existing Customer',
  'Self Generated' => 'Self Generated',
  'Employee' => 'Employee',
  'Partner' => 'Partner',
  'Public Relations' => 'Public Relations',
  'Direct Mail' => 'Direct Mail',
  'Conference' => 'Conference',
  'Trade Show' => 'Trade Show',
  'Web Site' => 'Web Site',
  'Word of mouth' => 'Word of mouth',
  'Email' => 'Email',
  'Campaign' => 'Campaign',
  'Other' => 'Other',
);
$app_list_strings['moduleList']['Accounts']='Customers';
$app_list_strings['moduleListSingular']['Accounts']='Customer';
$app_list_strings['record_type_display']['Accounts']='Customer';
$app_list_strings['parent_type_display']['Accounts']='Customer';
$app_list_strings['record_type_display_notes']['Accounts']='Customer';
$GLOBALS['app_list_strings']['gender_0']=array (
  'male' => 'Male',
  'female' => 'Female',
  'other' => 'Other',
);
$app_list_strings['moduleList']['Cases']='Tickets';
$app_list_strings['moduleListSingular']['Cases']='TIcket';
$app_list_strings['record_type_display']['Cases']='TIcket';
$app_list_strings['parent_type_display']['Cases']='TIcket';
$app_list_strings['record_type_display_notes']['Cases']='TIcket';
$GLOBALS['app_list_strings']['case_status_dom']=array (
  'Open_New' => 'New',
  'Open_Assigned' => 'Assigned',
  'Closed_Closed' => 'Closed',
  'Open_Pending Input' => 'Pending Input',
  'Closed_Rejected' => 'Rejected',
  'Closed_Duplicate' => 'Duplicate',
);
$GLOBALS['app_list_strings']['scrm_customers_country_code_c_list_cstm']=array (
  '' => '',
  'AF_AFG' => '93',
  'IN_IND' => '91',
  'LK_LKA' => '94',
  'US_USA' => '1',
  'YE_YEM' => '967',
);