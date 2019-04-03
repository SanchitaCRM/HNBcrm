<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2016-05-10 14:03:19
$dictionary['Opportunity']['fields']['actual_date_closed_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['actual_date_closed_c']['labelValue']='Actual Date Closed';

 

 // created: 2016-05-10 14:06:22
$dictionary['Opportunity']['fields']['date_lost_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['date_lost_c']['labelValue']='Date Lost';

 

 // created: 2015-08-20 11:47:31
$dictionary['Opportunity']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2015-08-20 11:47:31
$dictionary['Opportunity']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2015-08-20 11:47:31
$dictionary['Opportunity']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2015-08-20 11:47:31
$dictionary['Opportunity']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2017-08-03 18:50:55
$dictionary['Opportunity']['fields']['lead_source']['len']=100;
$dictionary['Opportunity']['fields']['lead_source']['inline_edit']=true;
$dictionary['Opportunity']['fields']['lead_source']['comments']='Source of the opportunity';
$dictionary['Opportunity']['fields']['lead_source']['merge_filter']='disabled';

 

 // created: 2016-05-11 11:35:53
$dictionary['Opportunity']['fields']['reason_for_lost_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['reason_for_lost_c']['labelValue']='Reason for Lost';

 

 // created: 2016-04-19 12:57:57
$dictionary['Opportunity']['fields']['tweet_id_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['tweet_id_c']['labelValue']='tweet id';

 

 // created: 2016-04-19 12:58:30
$dictionary['Opportunity']['fields']['twitter_handle_c']['inline_edit']='1';
$dictionary['Opportunity']['fields']['twitter_handle_c']['labelValue']='twitter handle';

 

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

?>