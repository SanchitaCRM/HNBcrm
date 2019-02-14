<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

/* * *******************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 * ****************************************************************************** */

class scrm_SMS_TemplateViewEdit extends ViewEdit {

    public function __construct() {
        parent::ViewEdit();
        $this->useForSubpanel = true;
        //~ $this->useModuleQuickCreateTemplate = true;
    }

    /**
     * @see SugarView::display()
     */
    public function display() {
        $FIELD_DEFS_JS = generateFieldDefsJS2();
        $dropdown = genDropDownJS2();

        $variable_module = "<select name='variable_module' tabindex='0' onchange='addVariables(document.EditView.variable_name,this.options[this.selectedIndex].value);'>$dropdown</select>";

        echo $js = <<<EOD
                        <script>
                        $FIELD_DEFS_JS
                        function insert_variable(text, mozaikId) {
			//use text version insert
			insert_variable_text(document.getElementById('description'), text);

}
function insert_variable_text(myField, myValue) {
	//IE support
	if (document.selection) {
		myField.focus();
		sel = document.selection.createRange();
		sel.text = myValue;
	}
	//MOZILLA/NETSCAPE support
	else if (myField.selectionStart || myField.selectionStart == '0') {
		var startPos = myField.selectionStart;
		var endPos = myField.selectionEnd;
		myField.value = myField.value.substring(0, startPos)
			+ myValue
			+ myField.value.substring(endPos, myField.value.length);
	} else {
		myField.value += myValue;
	}
}

function showVariable(form) {
	if(!form) {
		form = 'EditView';
	}
	document[form].variable_text.value =
		document[form].variable_name.options[document[form].variable_name.selectedIndex].value;
}

function addVariables(the_select,the_module, form) {
//    alert(JSON.stringify(the_select)+"--------->"+the_module+"--------->"+ form)
        $("#variable_text").val("");        
	the_select.options.length = 0;
	for(var i=0;i<field_defs[the_module].length;i++) {
		var new_option = document.createElement("option");
		new_option.value = "$"+field_defs[the_module][i].name;
		new_option.text= field_defs[the_module][i].value;
		the_select.options.add(new_option,i);
	}
	showVariable(form);
}
		$(document).ready(function(){
			
$("#Default_scrm_SMS_Template_Subpanel tbody tr:last").before("<tr class='variable_tr' ><td scope='row' align='left' >Insert Variable:&nbsp;</td><td colspan='3' >$variable_module<select name='variable_name' tabindex='0' onchange='showVariable();'></select><span scope='row'></span><input type='text' size='30' tabindex='0' name='variable_text' id='variable_text' /><input type='button' tabindex='0' onclick='insert_variable(document.EditView.variable_text.value)' class='button' value='Insert'></td></tr>");
                  
		});
		</script>
EOD;
        parent::display();
    }

}

function genDropDownJS2() {
    global $app_list_strings, $beanList, $beanFiles;

    $lblContactAndOthers = implode('/', array(
        isset($app_list_strings['moduleListSingular']['Contacts']) ? $app_list_strings['moduleListSingular']['Contacts'] : 'Contact',
        isset($app_list_strings['moduleListSingular']['Leads']) ? $app_list_strings['moduleListSingular']['Leads'] : 'Lead',
        isset($app_list_strings['moduleListSingular']['Prospects']) ? $app_list_strings['moduleListSingular']['Prospects'] : 'Target',
    ));


    $dropdown .= "<option value=''>--Select--</option>";
    array_multisort($app_list_strings['moduleList'], SORT_ASC, $app_list_strings['moduleList']);

    foreach ($app_list_strings['moduleList'] as $key => $name) {
        if (isset($beanList[$key]) && isset($beanFiles[$beanList[$key]]) && !str_begin($key, 'AOW_') && !str_begin($key, 'zr2_')) {

            if ($key == 'Contacts') {
                $dropdown .= "<option value='" . $key . "'>" . $lblContactAndOthers . "</option>";
            } else if (isset($app_list_strings['moduleListSingular'][$key])) {
                $dropdown .= "<option value='" . $key . "'>" . $app_list_strings['moduleListSingular'][$key] . "</option>";
            } else {
                $dropdown .= "<option value='" . $key . "'>" . $app_list_strings['moduleList'][$key] . "</option>";
            }
        }
    }

    return $dropdown;
}

function generateFieldDefsJS2() {
    global $app_list_strings, $beanList, $beanFiles;


    $badFields = array(
        'account_description',
        'contact_id',
        'lead_id',
        'opportunity_amount',
        'opportunity_id',
        'opportunity_name',
        'opportunity_role_id',
        'opportunity_role_fields',
        'opportunity_role',
        'campaign_id',
        // User objects
        'id',
        'user_preferences',
        'accept_status',
        'user_hash',
        'authenticate_id',
        'sugar_login',
        'reports_to_id',
        'reports_to_name',
        'is_admin',
        'receive_notifications',
        'modified_user_id',
        'modified_by_name',
        'created_by',
        'created_by_name',
        'accept_status_id',
        'accept_status_name',
    );

    $loopControl = array();
    $prefixes = array();

    foreach ($app_list_strings['moduleList'] as $key => $name) {
        if (isset($beanList[$key]) && isset($beanFiles[$beanList[$key]]) && !str_begin($key, 'AOW_')) {

            require_once($beanFiles[$beanList[$key]]);
            $focus = new $beanList[$key];
            $loopControl[$key][$key] = $focus;
            $prefixes[$key] = strtolower($focus->object_name) . '_';
            if ($focus->object_name == 'Case')
                $prefixes[$key] = 'a' . strtolower($focus->object_name) . '_';
        }
    }

    $contact = new Contact();
    $lead = new Lead();
    $prospect = new Prospect();

    $loopControl['Contacts'] = array(
        'Contacts' => $contact,
        'Leads' => $lead,
        'Prospects' => $prospect,
    );

    $prefixes['Users'] = 'contact_user_';


    $collection = array();
    foreach ($loopControl as $collectionKey => $beans) {
        $collection[$collectionKey] = array();
        foreach ($beans as $beankey => $bean) {

            foreach ($bean->field_defs as $key => $field_def) {
                if (/* ($field_def['type'] == 'relate' && empty($field_def['custom_type'])) || */
                        ($field_def['type'] == 'assigned_user_name' || $field_def['type'] == 'link') ||
                        ($field_def['type'] == 'bool') ||
                        (in_array($field_def['name'], $badFields))
                ) {
                    continue;
                }
                if (!isset($field_def['vname'])) {
                    //echo $key;
                }
                // valid def found, process
                $optionKey = strtolower("{$prefixes[$collectionKey]}{$key}");
                if (isset($field_def['vname'])) {
                    $optionLabel = preg_replace('/:$/', "", translate($field_def['vname'], $beankey));
                } else {
                    $optionLabel = preg_replace('/:$/', "", $field_def['name']);
                }
                $dup = 1;
                foreach ($collection[$collectionKey] as $value) {
                    if ($value['name'] == $optionKey) {
                        $dup = 0;
                        break;
                    }
                }
                if ($dup)
                    $collection[$collectionKey][] = array("name" => $optionKey, "value" => $optionLabel);
            }
        }
    }

    $json = getJSONobj();
    $ret = "var field_defs = ";
    $ret .= $json->encode($collection, false);
    $ret .= ";";
    return $ret;
}
