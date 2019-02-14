<?php

/**
 * Advanced OpenWorkflow, Automating SugarCRM.
 * @package Advanced OpenWorkflow for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
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
 * @author SalesAgility <info@salesagility.com>
 */
require_once('modules/AOW_Actions/actions/actionBase.php');

class actionSendSMS extends actionBase {

    private $emailableModules = array();

    function __construct($id = '') {
        parent::__construct($id);
    }

    /**
     * @deprecated deprecated since version 7.6, PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code, use __construct instead
     */
    function actionSendSMS($id = '') {
        $deprecatedMessage = 'PHP4 Style Constructors are deprecated and will be remove in 7.8, please update your code';
        if (isset($GLOBALS['log'])) {
            $GLOBALS['log']->deprecated($deprecatedMessage);
        } else {
            trigger_error($deprecatedMessage, E_USER_DEPRECATED);
        }
        self::__construct($id);
    }

    function loadJS() {
        return array('modules/AOW_Actions/actions/actionSendSMS.js');
    }

    function edit_display($line, SugarBean $bean = null, $params = array()) {
        global $app_list_strings;
        $sms_templates_arr = get_bean_select_array(true, 'scrm_SMS_Template', 'name', '', 'name');

        if (!in_array($bean->module_dir, getEmailableModules()))
            unset($app_list_strings['aow_sms_type_list']['Record Email']);
        $targetOptions = getRelatedEmailableFields($bean->module_dir);
        if (empty($targetOptions))
            unset($app_list_strings['aow_sms_type_list']['Related Field']);

        $html = '<input type="hidden" name="aow_sms_type_list" id="aow_sms_type_list" value="' . get_select_options_with_id($app_list_strings['aow_sms_type_list'], '') . '">
				  <input type="hidden" name="aow_sms_to_list" id="aow_sms_to_list" value="' . get_select_options_with_id($app_list_strings['aow_sms_to_list'], '') . '">';

//        $checked = '';
//        if(isset($params['individual_email']) && $params['individual_email']) $checked = 'CHECKED';

        $html .= "<table border='0' cellpadding='0' cellspacing='0' width='100%' data-workflow-action='send-sms'>";
        $html .= "<tr>";
//        $html .= '<td id="relate_label" scope="row" valign="top"></td>';
//        $html .= "<td valign='top'></td>";
//        $html .= '</td>';

        if (!isset($params['sms_template']))
            $params['sms_template'] = '';
        $hidden = "style='visibility: hidden;'";
        if ($params['sms_template'] != '')
            $hidden = "";

        $html .= '<td id="name_label" scope="row" valign="top"><label>' . translate("LBL_SMS_TEMPLATE", "AOW_Actions") . ':<span class="required">*</span></label></td>';
        $html .= "<td valign='top'>";
        $html .= "<select name='aow_actions_param[" . $line . "][sms_template]' id='aow_actions_param_sms_template" . $line . "' onchange='show_edit_template_link(this," . $line . ");' >" . get_select_options_with_id($sms_templates_arr, $params['sms_template']) . "</select>";

        $html .= "&nbsp;<a href='javascript:open_sms_template_form(" . $line . ")' >" . translate('LBL_CREATE_EMAIL_TEMPLATE', 'AOW_Actions') . "</a>";
        $html .= "&nbsp;<span name='edit_template' id='aow_actions_edit_template_link" . $line . "' $hidden><a href='javascript:edit_sms_template_form(" . $line . ")' >" . translate('LBL_EDIT_EMAIL_TEMPLATE', 'AOW_Actions') . "</a></span>";
        $html .= "</td>";
        $html .= "</tr>";
        $html .= "<tr>";
        $html .= '<td id="name_label" scope="row" valign="top"><label>' . translate("LBL_SMS", "AOW_Actions") . ':<span class="required">*</span></label></td>';
        $html .= '<td valign="top" scope="row">';

        $html .= '<button type="button" onclick="add_smsLine(' . $line . ')"><img src="' . SugarThemeRegistry::current()->getImageURL('id-ff-add.png') . '"></button>';
        $html .= '<table id="smsLine' . $line . '_table" width="100%" class="sms-line"></table>';
        $html .= '</td>';
        $html .= "</tr>";
        $html .= "</table>";

        $html .= "<script id ='aow_script" . $line . "'>";

        //backward compatible
        if (isset($params['sms_target_type']) && !is_array($params['sms_target_type'])) {
            $sms = '';
            switch ($params['sms_target_type']) {
                case 'Phone No':
                    $sms = $params['sms'];
                    break;
                case 'Specify User':
                    $sms = $params['email_user_id'];
                    break;
                case 'Related Field':
                    $sms = $params['email_target'];
                    break;
            }
            $html .= "load_smsline('" . $line . "','to','" . $params['sms_target_type'] . "','" . $sms . "');";
        }
        //end backward compatible
//        echo "<pre>";
//        print_r($params);
//        echo "</pre>";
//        exit;
        if (isset($params['sms_target_type'])) {
            foreach ($params['sms_target_type'] as $key => $field) {
                if (is_array($params['sms'][$key]))
                    $params['sms'][$key] = json_encode($params['sms'][$key]);
                $html .= "load_smsline('" . $line . "','" . $params['sms_to_type'][$key] . "','" . $params['sms_target_type'][$key] . "','" . $params['sms'][$key] . "','" . $params['phone_field'][$key] . "');";
            }
        }
        $html .= "</script>";

        return $html;
    }

    private function getSMSFromParams(SugarBean $bean, $params) {

        $smss = array();

        //backward compatible
        if (isset($params['sms_target_type']) && !is_array($params['sms_target_type'])) {
            $sms = '';
            switch ($params['sms_target_type']) {
                case 'Phone No':
                    $params['sms'] = array($params['sms']);
                    break;
                case 'Specify User':
                    $params['sms'] = array($params['email_user_id']);
                    break;
                case 'Related Field':
                    $params['sms'] = array($params['email_target']);
                    break;
            }
            $params['sms_target_type'] = array($params['sms_target_type']);
            $params['sms_to_type'] = array('to');
        }
        //  end backward compatible

        if (isset($params['sms_target_type'])) {
            foreach ($params['sms_target_type'] as $key => $field) {
                switch ($field) {
                    case 'Phone No':
                        if (trim($params['sms'][$key]) != '')
                            $smss[$params['sms_to_type'][$key]][] = $params['sms'][$key];
                        break;
                    case 'Specify User':
                        $user = new User();
                        $user->retrieve($params['sms'][$key]);
                        $user_sms1 = $user->$params['phone_field'][$key];

                        if (trim($user_sms1) != '') {
                            $smss[$params['sms_to_type'][$key]][] = $user_sms1;
                            $smss['template_override'][$user_sms1] = array('Users' => $user->id);
                        }

                        break;
                    case 'Users':
                        $users = array();
                        switch ($params['sms'][$key][0]) {
                            Case 'security_group':
                                if (file_exists('modules/SecurityGroups/SecurityGroup.php')) {
                                    require_once('modules/SecurityGroups/SecurityGroup.php');
                                    $security_group = new SecurityGroup();
                                    $security_group->retrieve($params['sms'][$key][1]);
                                    $users = $security_group->get_linked_beans('users', 'User');
                                    $r_users = array();
                                    if ($params['sms'][$key][2] != '') {
                                        require_once('modules/ACLRoles/ACLRole.php');
                                        $role = new ACLRole();
                                        $role->retrieve($params['sms'][$key][2]);
                                        $role_users = $role->get_linked_beans('users', 'User');
                                        foreach ($role_users as $role_user) {
                                            $r_users[$role_user->id] = $role_user->name;
                                        }
                                    }
                                    foreach ($users as $user_id => $user) {
                                        if ($params['sms'][$key][2] != '' && !isset($r_users[$user->id])) {
                                            unset($users[$user_id]);
                                        }
                                    }
                                    break;
                                }
                            //No Security Group module found - fall through.
                            Case 'role':
                                require_once('modules/ACLRoles/ACLRole.php');
                                $role = new ACLRole();
                                $role->retrieve($params['sms'][$key][2]);
                                $users = $role->get_linked_beans('users', 'User');
                                break;
                            Case 'all':
                            default:
                                global $db;
                                $sql = "SELECT id from users WHERE status='Active' AND portal_only=0 ";
                                $result = $db->query($sql);
                                while ($row = $db->fetchByAssoc($result)) {
                                    $user = new User();
                                    $user->retrieve($row['id']);
                                    $users[$user->id] = $user;
                                }
                                break;
                        }
                        foreach ($users as $user) {

                            $recordsms = $user->$params['phone_field'][$key];
                            if (trim($recordsms) != '') {
                                $smss[$params['sms_to_type'][$key]][] = $recordsms;
                                $smss['template_override'][$recordsms] = array('Users' => $user->id);
                            }
//                                 $GLOBALS['log']->fatal('smss<br>' . print_r($smss, true));
                        }
                        break;
                    case 'Related Field':
                        $smsTarget = $params['sms'][$key];
                        $relatedFields = array_merge($bean->get_related_fields(), $bean->get_linked_fields());
                        $field = $relatedFields[$smsTarget];
                        if ($field['type'] == 'relate') {
                            $linkedBeans = array();
                            $idName = $field['id_name'];
                            $id = $bean->$idName;
                            $linkedBeans[] = BeanFactory::getBean($field['module'], $id);
                        } else if ($field['type'] == 'link') {
                            $relField = $field['name'];
                            if (isset($field['module']) && $field['module'] != '') {
                                $rel_module = $field['module'];
                            } else if ($bean->load_relationship($relField)) {
                                $rel_module = $bean->$relField->getRelatedModuleName();
                            }
                            $linkedBeans = $bean->get_linked_beans($relField, $rel_module);
                        } else {
                            $linkedBeans = $bean->get_linked_beans($field['link'], $field['module']);
                        }
                        if ($linkedBeans) {
                            foreach ($linkedBeans as $linkedBean) {
                                $rel_email = $linkedBean->$params['phone_field'][$key];
                                if (trim($rel_email) != '') {
                                    $smss[$params['sms_to_type'][$key]][] = $rel_email;
                                    $smss['template_override'][$rel_email] = array($linkedBean->module_dir => $linkedBean->id);
                                }
                            }
                        }
                        break;
                    case 'Record Phone':
                        $recordsms = $bean->$params['phone_field'][$key];
                        if (trim($recordsms) != '')
                            $smss[$params['sms_to_type'][$key]][] = $recordsms;
                        break;
                }
            }
        }
        return $smss;
    }

    function run_action(SugarBean $bean, $params = array(), $in_save = false) {

        include_once('modules/scrm_SMS_Template/scrm_SMS_Template.php');
        $smsTemp = new scrm_SMS_Template();
        $smsTemp->retrieve($params['sms_template']);
//      $GLOBALS['log']->fatal('Phone No<br>' . print_r($smsTemp, true));

        if ($smsTemp->id == '') {
            return false;
        }

        $phone = $this->getSMSFromParams($bean, $params);

//        $GLOBALS['log']->fatal('Phone No<br>' . print_r($phone, true));
        if (!isset($phone['to']) || empty($phone['to']))
            return false;




        foreach ($phone['to'] as $sms_to) {


            $this->parse_template($bean, $smsTemp);


            $sms_body = $smsTemp->description;
            $this->sendSMS($sms_to, $smsTemp->name, $sms_body, $bean);
        }

        return true;
    }

    function parse_template(SugarBean $bean, &$template, $object_override = array()) {
        global $sugar_config;

        require_once('modules/AOW_Actions/actions/templateParser.php');

        $object_arr[$bean->module_dir] = $bean->id;

        foreach ($bean->field_defs as $bean_arr) {
            if ($bean_arr['type'] == 'relate') {
                if (isset($bean_arr['module']) && $bean_arr['module'] != '' && isset($bean_arr['id_name']) && $bean_arr['id_name'] != '' && $bean_arr['module'] != 'EmailAddress') {
                    $idName = $bean_arr['id_name'];
                    if (isset($bean->field_defs[$idName]) && $bean->field_defs[$idName]['source'] != 'non-db') {
                        if (!isset($object_arr[$bean_arr['module']]))
                            $object_arr[$bean_arr['module']] = $bean->$idName;
                    }
                }
            }
            else if ($bean_arr['type'] == 'link') {
                if (!isset($bean_arr['module']) || $bean_arr['module'] == '')
                    $bean_arr['module'] = getRelatedModule($bean->module_dir, $bean_arr['name']);
                if (isset($bean_arr['module']) && $bean_arr['module'] != '' && !isset($object_arr[$bean_arr['module']]) && $bean_arr['module'] != 'EmailAddress') {
                    $linkedBeans = $bean->get_linked_beans($bean_arr['name'], $bean_arr['module'], array(), 0, 1);
                    if ($linkedBeans) {
                        $linkedBean = $linkedBeans[0];
                        if (!isset($object_arr[$linkedBean->module_dir]))
                            $object_arr[$linkedBean->module_dir] = $linkedBean->id;
                    }
                }
            }
        }

        $object_arr['Users'] = is_a($bean, 'User') ? $bean->id : $bean->assigned_user_id;

        $object_arr = array_merge($object_arr, $object_override);

        $parsedSiteUrl = parse_url($sugar_config['site_url']);
        $host = $parsedSiteUrl['host'];
        if (!isset($parsedSiteUrl['port'])) {
            $parsedSiteUrl['port'] = 80;
        }

        $port = ($parsedSiteUrl['port'] != 80) ? ":" . $parsedSiteUrl['port'] : '';
        $path = !empty($parsedSiteUrl['path']) ? $parsedSiteUrl['path'] : "";
        $cleanUrl = "{$parsedSiteUrl['scheme']}://{$host}{$port}{$path}";

        $url = $cleanUrl . "/index.php?module={$bean->module_dir}&action=DetailView&record={$bean->id}";

//        $template->subject = str_replace("\$contact_user", "\$user", $template->subject);
//        $template->body_html = str_replace("\$contact_user", "\$user", $template->body_html);
//        $template->body = str_replace("\$contact_user", "\$user", $template->body);
//        $template->subject = aowTemplateParser::parse_template($template->subject, $object_arr);
//        $template->body_html = aowTemplateParser::parse_template($template->body_html, $object_arr);
//        $template->body_html = str_replace("\$url", $url, $template->body_html);
//        $template->body = aowTemplateParser::parse_template($template->body, $object_arr);
//        $template->body = str_replace("\$url", $url, $template->body);

        $template->description = aowTemplateParser::parse_template($template->description, $object_arr);
        $template->description = str_replace("\$url", $url, $template->description);
        $template->description = str_replace("\$contact_user", "\$user", $template->description);
        $template->description = str_replace("&nbsp;", "", $template->description);
//        $GLOBALS['log']->fatal('Parse Template<br>' . print_r($template, true));
    }

    function sendSMS($smsTo, $smsSubject, $smsBody, SugarBean $relatedBean = null) {


        global $sugar_config;
        require_once('modules/scrm_SMS_Workflow/scrm_SMS_Workflow.php');
        $smsMod = new scrm_SMS_Workflow();

        $base_url = $sugar_config['sms_setting']['base_url'];
        $sender = $sugar_config['sms_setting']['sender'];
        $api_key = $sugar_config['sms_setting']['api_key'];

        // Prepare data for POST request
        $data = array('apikey' => $api_key, 'numbers' => $smsTo, "sender" => $sender, "message" => $smsBody);

        // Send the POST request with cURL
        $ch = curl_init($base_url.'/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
      // Process your response here
      
        $checkstatus = json_decode($response, true);
        $message_id=$checkstatus['messages'][0]['id'];


        $data = array('apikey' => $api_key, 'message_id' => $message_id);
 
	// Send the POST request with cURL
	$ch = curl_init($base_url.'status_message/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$mainstatus = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	$mainstatus=json_decode($mainstatus, true);

        $smsMod->deleted = '0';
        $smsMod->name = "SMS: " . $smsTo;
        $smsMod->description = $smsBody;
        $smsMod->message_receiver_c = $smsTo;
        if ($relatedBean instanceOf SugarBean && !empty($relatedBean->id)) {
            $smsMod->parent_type = $relatedBean->module_dir;
            $smsMod->parent_id = $relatedBean->id;
        }
        if (isset($mainstatus['message']['status'])) {
            $smsMod->message_status_c = $mainstatus['message']['status'];
            $smsMod->message_id_c = $mainstatus['message']['id'];
        } else {
            $smsMod->message_status_c = $mainstatus['message']['status'];
            $smsMod->message_id_c = '';
        }
        $smsMod->date_entered = TimeDate::getInstance()->nowDb();
        $smsMod->modified_user_id = '1';
        $smsMod->created_by = '1';
//            $emailObj->status = 'sent';
        $smsMod->save();
//        $GLOBALS['log']->fatal('SMS Sended<br>' . $smsTo . "<----->" . print_r($smsMod->message_status_c, true));

        return true;

    }

}
