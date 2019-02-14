<?php

if (!defined('sugarEntry'))
    define('sugarEntry', true);
require_once('include/entryPoint.php');
require_once('config.php');
include('include/language/en_us.lang.php');
include('custom/include/language/en_us.lang.php');


global $db, $sugar_config, $mod_strings, $app_list_strings;


$dashlet_id = $_POST['dashlet_id'];
$user_id = $_POST['user_id'];
$exp_arr = explode(",", $_POST['stuff']);
foreach ($exp_arr as $val) {
    $exp_arr1 = explode(":", $val);
    $data[$exp_arr1[0]] = $exp_arr1[1];
}

$bean = BeanFactory::getBean($data['module']);
$field_defs[$data['module']] = $bean->getFieldDefinitions();
$bean = $bean->retrieve($data['record']);




$customMetadate = 'custom/modules/' . $data['module'] . '/metadata/detailviewdefs.php';
if (file_exists($customMetadate)) {
    require($customMetadate);
    $columns = $viewdefs[$data['module']]['DetailView']['templateMeta']['panels'];


    $columns = array();
    foreach ($viewdefs[$data['module']]['DetailView']['panels'] as $allcolvalue) {
        foreach ($allcolvalue as $rowvalue) {
            foreach ($rowvalue as $colkey => $colvalue) {

                if (is_array($colvalue)) {
                    $columns[] = $colvalue['name'];
                } else {
                    $columns[] = $colvalue;
                }
            }
        }
    }
}

  if ($data['module'] == 'Emails') {
            $customMetadate = 'modules/Emails/Dashlets/MyEmailsDashlet/MyEmailsDashlet.data.php';
            if (file_exists($customMetadate)) {
                require($customMetadate);
                $emailscolumns = $dashletData['MyEmailsDashlet']['columns'];


                $columns = array();
                foreach ($emailscolumns as $ekey => $evalue) {


                    $columns[] = $ekey;
                }
            }
             
        }
       


if (file_exists($customMetadate)) {
        require($customMetadate);



foreach ($columns as $fkey) {
      
   $fvalue=!empty($bean->fetched_row[$fkey])?$bean->fetched_row[$fkey]:$bean->$fkey;

    if (!empty($field_defs[$data['module']][$fkey]['options'])) {
        if (count($app_list_strings[$field_defs[$data['module']][$fkey]['options']]) >= 1) {
            $dp_element = $app_list_strings[$field_defs[$data['module']][$fkey]['options']];
        } else {
            $dp_element = $GLOBALS['app_list_strings'][$field_defs[$data['module']][$fkey]['options']];
        }
    }


    if (!empty($field_defs[$data['module']][$fkey]['options'])) {
        if (count($app_list_strings[$field_defs[$data['module']][$fkey]['options']]) >= 1) {
            $dp_element = $app_list_strings[$field_defs[$data['module']][$fkey]['options']];
        } else {
            $dp_element = $GLOBALS['app_list_strings'][$field_defs[$data['module']][$fkey]['options']];
        }
    }

    //If user has made any changes in detailview layout then it will checkcking detailviewdefs.php file is exist, then it will showing all the fields from the file //changes by roshan sarode start
    

if($fkey=='from_addr'){
     $full_label = "From:";
}else if($fkey=='to_addrs'){
 $full_label = "To:";
}else{
            $full_label = $field_defs[$data['module']][$fkey]['vname'];
}
            $get_label = translate($full_label, $data['module']);
            if (is_array($get_label)){
                $get_label = str_replace(":", "", $full_label);
            }
            if (!empty($get_label)) {

                if ($fvalue == '') {
                    $fvalue = '&nbsp';
                } else {

                    if (count($dp_element) > 0) {

                        $vall = htmlspecialchars_decode($dp_element[$fvalue]);

                        if ($vall == "") {
                            $fvalue = $fvalue;
                        } else {
                            $fvalue = $vall;
                        }
                    } else {

                        if ($fkey == 'assigned_user_id') {

                            $fvalue = $bean->assigned_user_name;
                        } elseif ($fkey == 'created_by') {
                            $fvalue = $bean->created_by_name;
                        }

                        $fvalue = htmlspecialchars_decode($fvalue);
                    }
                }
//echo "-----1--->".$bean->field_name_map[$fkey]['type'];
//$fvalue=($bean->field_name_map[$fkey]['type']=="currency")? "Rs. ".(number_format($fvalue,2)):($bean->field_name_map[$fkey]['type']=="datetime" || $bean->field_name_map[$fkey]['type']=="datetimecombo")?setCurrentTimeDate($fvalue):$fvalue;

                $view_array[$get_label] = checkType($bean->field_name_map[$fkey]['type'], $fvalue);
            }
        }
   }  //If user has made any changes in detailview layout then it will checkcking detailviewdefs.php file is exist, then it will showing all the fields from the file //changes by roshan sarode end
   else{
   foreach ($bean->fetched_row as $fkey => $fvalue) {
     //if file is not exist that time it will be showing all fields start
      
      
        $columns = array('id', 'id_c', 'modified_user_id', 'deleted', 'parent_id'); //not show columns

        if (!in_array($fkey, $columns) ) {

            $full_label = $field_defs[$data['module']][$fkey]['vname'];
            $get_label = translate($full_label, $data['module']);
            if (is_array($get_label))
                $get_label = str_replace(":", "", $full_label);

            if (!empty($get_label)) {
                if ($fvalue == '') {
                    $fvalue = '&nbsp;';
                } else {

                    if (count($dp_element) > 0) {

                        $vall = htmlspecialchars_decode($dp_element[$fvalue]);

                        if ($vall == "") {
                            $fvalue = $fvalue;
                        } else {
                            $fvalue = $vall;
                        }
                    } else {

                        if ($fkey == 'assigned_user_id') {
                            $fvalue = $bean->assigned_user_name;
                        } elseif ($fkey == 'created_by') {
                            $fvalue = $bean->created_by_name;
                        } elseif ($fkey == 'parent_type') {


                            $label = '';

                            if (isset($app_list_strings['moduleList'][$fvalue])) {
                                $label = $app_list_strings['moduleList'][$fvalue];
                            } else {
                                $label = $GLOBALS['app_list_strings']['parent_type_display'][$fvalue];
                            }
                            $fvalue = $label;
                        }

                        $fvalue = htmlspecialchars_decode($fvalue);
                    }
                }
                //echo "-----2--->".$bean->field_name_map[$fkey]['type'];
//$fvalue=($bean->field_name_map[$fkey]['type']=="currency")? "Rs. ".(number_format($fvalue,2)):($bean->field_name_map[$fkey]['type']=="datetime" || $bean->field_name_map[$fkey]['type']=="datetimecombo")?setCurrentTimeDate($fvalue):$fvalue;

                $view_array[$get_label] = checkType($bean->field_name_map[$fkey]['type'], $fvalue);
            }
        }
//if file is not exist that time it will be showing all fields end

        }
    unset($dp_element);


   }



$icon_query = $db->query("SELECT * FROM module_icons where id='1'");
$icon_row = $db->fetchByAssoc($icon_query);
$icon_module = unserialize(base64_decode($icon_row['icons']));


$cicon = (!empty($icon_module[$data['module']]['faicon'])) ? $icon_module[$data['module']]['faicon'] : $icon_module['default']['faicon'];
$bicon = (!empty($icon_module[$data['module']]['bgcolor'])) ? $icon_module[$data['module']]['bgcolor'] : $icon_module['default']['bgcolor'];
//$icon.='<i class="fa fa-thumb-tack fa-lg" aria-hidden="true" style="color: #EC5152"></i>&nbsp;';
$icon.='  <a href="javascript:void(0)" ><span class="fa-stack fa-custom-stack"><i class="fa fa-square-o"></i><i class="fa ';
$icon.= $cicon;
$icon.= ' fa-stack-1x" style="background-color:';
$icon.= $bicon;
$icon.= ';color:#FFFFFF;border-radius:5px"></i></span>&nbsp;</a>';

$act_name = textWrap($bean->fetched_row['name'], 90);
echo $header = <<<header
                 <div class="row act_title"><div class="col-sm-12 act_inn_div"><span class="act_icon">$icon</span><span class="col-sm-11 act_name" title="$act_name">$act_name </span><span class="preview_link">
            <a href="javascript:void(0);" class="pull-right" onclick="$('.gen_his_acti_side_pane').removeClass('show_side_pane');"><i class="fa fa-1x fa-times"></i></a>
        </span></div>  </div>;
header;

$j = 0;
echo '<div class="act_body">';
foreach ($view_array as $vkey => $vvalue) {
    echo '<div class="col-sm-12 field_row">';
    echo '<div class="col-sm-12 "><div class="act-field">' . $vkey . '</div></div>';
    echo '<div class="col-sm-12">';
    echo '<div class="act-value">' . $vvalue . '</div>';
    echo '</div>';
    echo '</div >';
    $j++;
}
echo '</div>';


echo '<div class="more-box">
	<a class="btn more-button" href="index.php?action=ajaxui#ajaxUILoc=index.php%3Faction%3DDetailView%26module%3D' . $data['module'] . '%26record%3D' . $data['record'] . '">More </a>
	</div>';

function setCurrentTimeDate($dbDate) {

    $localDate = date("d-m-Y h:ia", strtotime($dbDate . "+330 minutes"));

    return $localDate;
}

function checkType($type, $value) {
    switch ($type) {
        case 'currency':
            $result = number_format($value, 2);
            break;
        case 'datetime':
            $result = setCurrentTimeDate($value);
            break;
        case 'datetimecombo':
            $result = setCurrentTimeDate($value);
            break;
        default :
            $result = $value;
            break;
    }
    return $result;
}

function textWrap($str, $y) {
    if (strlen($str) > $y) {
        return substr($str, 0, $y) . "...";
    } else {
        return $str;
    }
}

?>
