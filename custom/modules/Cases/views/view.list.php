<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 
 * SimpleCRM standard edition is an extension to SuiteCRM 7.8.5 and SugarCRM Community Edition 6.5.24. 
 * It is developed by SimpleCRM (https://www.simplecrm.com.sg)
 * Copyright (C) 2016 - 2017 SimpleCRM
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
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/


require_once('include/MVC/View/views/view.list.php');
require_once('modules/Cases/CasesListViewSmarty.php');

class CasesViewList extends ViewList {
	
	function CasesViewList(){
		parent::ViewList();
	}
	
	function preDisplay(){
		$this->lv = new CasesListViewSmarty();
    //$this->lv->actionsMenuExtraItems[] = $this->getNewActionMenuItem();
    $this->lv->actionsMenuExtraItems[] = $this->buildMyMenuItem();
	}
	
	
	function display()
 	{
			echo $js =<<<EOD
		<script>
		
		$(document).ready(function(){
		$(".status_custom").each(function() {
    var val=trim($(this).html());

		if(val=="New")
		{
		$(this).html("<span class='label label-primary'>New</span>");
		}else if(val=="Assigned")
		{
		$(this).html("<span class='label label-danger'>Assigned</span>");
		}else if(val=="Pending Input")
		{
		$(this).html("<span class='label label-brown'>Pending Input</span>");
		}else if(val=="Closed")
		{
		$(this).html("<span class='label label-success'>Closed</span>");
		}else if(val=="Rejected")
		{
		$(this).html("<span class='label label-danger'>Rejected</span>");
		}else if(val=="Duplicate")
		{
		$(this).html("<span class='label label-default'>Duplicate</span>");
		}
});	
    actionLinkTop
			})
	
		</script>
EOD;
		parent::display();
		
 	}
  
  /*private function getNewActionMenuItem(){
      global $mod_strings;
      return <<<EOF
      <a href='javascript:void(0)'
      onclick="return sListView.send_form(true, 'Cases', 'index.php?entryPoint=customEntryPoint','Please select at least 1 record to proceed.')">
          {$mod_strings['LBL_NEW_ACTION']}
      </a>";
EOF;
    } */
  
   
 protected function buildMyMenuItem(){
    global $app_strings;

    return <<<EOHTML
    <a class="menuItem" style="width:150px;" href="#" onmouseover='hiliteItem(this,"yes");'
    onmouseout='unhiliteItem(this);'
    onclick="sugarListView.get_checks();
    if(sugarListView.get_checks_count() &lt; 1) {
        alert('{$app_strings['LBL_LISTVIEW_NO_SELECTED']}');
        return false;
    }
    document.MassUpdate.action.value='displaypassedids';
    document.MassUpdate.submit();">NewExport</a>
EOHTML;
    }

}

?>
