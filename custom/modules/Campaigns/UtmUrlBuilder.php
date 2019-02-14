<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
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

/*********************************************************************************

 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

$html = <<<HTML
        <script type="text/javascript">
                        $(document).ready(function(){
                            $('.utm_url_div').hide();
                        });
			function create_utm_url() {
				var complete_url = '';
				if($('#website_url').val() == ''){
					$('.utm_url_div').hide();
					$('.required_div').show();
					return false;
				}

				if ($('#campaign_source').val() == '') {
					$('.utm_url_div').hide();
					$('.required_div').show();
					return false;
				}

				$('.utm_url_div').show();
				$('.required_div').hide();


				complete_url = $.trim($('#website_url').val());


				if( $('#campaign_source').val() != ''){
					if ($('#website_url').val().indexOf('?') == -1) {
						complete_url += '?utm_source='+encodeURIComponent($.trim($('#campaign_source').val()));
					} else {
						complete_url += '&utm_source='+encodeURIComponent($.trim($('#campaign_source').val()));
					}
				}


				if( $('#campaign_medium').val() != ''){
					var valueUrl = $('#campaign_medium').val();
					complete_url += '&utm_medium='+encodeURIComponent($.trim($('#campaign_medium').val()));
				}

				if( $('#campaign_name').val() != ''){
					var valueUrl = $('#campaign_name').val();
					complete_url += '&utm_campaign='+encodeURIComponent($.trim($('#campaign_name').val()));
				}

				if( $('#campaign_term').val() != ''){
					var valueUrl = $('#campaign_term').val();
					complete_url += '&utm_term='+encodeURIComponent($.trim($('#campaign_term').val()));
				}

				if( $('#campaign_content').val() != ''){
					var valueUrl = $('#campaign_content').val();
					complete_url += '&utm_content='+encodeURIComponent($.trim($('#campaign_content').val()));
				}
                                
                                complete_url = complete_url;

				$('#utm_url').val(complete_url);
			}
        
        function copyToClipboard() {
            var copyText = $("#utm_url");
            copyText.select();
            document.execCommand("copy");
            alert("UTM URL Copied to Clipboard ");
          }
	</script>
   <div class="row">
        <div class="col-md-12" align="center"><h3><b>UTM URL Builder</b></h3></div>
 	<div class="col-md-12">
 		<div class="col-md-8 col-md-offset-2">
			  <div class="form-group">
			    <label for="website_url">Website URL*</label>
			    <textarea class="form-control" id="website_url" rows="1" onkeyup="create_utm_url()"></textarea>
			  </div>
			  <div class="form-group">
			    <label for="campaign_source">Campaign Source*</label>
			    <input type="text" class="form-control" onkeyup="create_utm_url()" id="campaign_source">
			  </div>
			  <div class="form-group">
			    <label for="campaign_medium">Campaign Medium</label>
			    <input type="text" class="form-control" id="campaign_medium" onkeyup="create_utm_url()">
			  </div>
			  <div class="form-group">
			    <label for="campaign_name">Campaign Name</label>
			    <input type="text" class="form-control" id="campaign_name" onkeyup="create_utm_url()">
			  </div>
			  <div class="form-group">
			    <label for="campaign_term">Campaign Term</label>
			    <input type="text" class="form-control" id="campaign_term" onkeyup="create_utm_url()">
			  </div>
			  <div class="form-group">
			    <label for="campaign_content">Campaign Content</label>
			    <input type="text" class="form-control" id="campaign_content" onkeyup="create_utm_url()">
			  </div>
			  <div class="panel panel-default">
			  	<div class="panel-heading"><span style="font-size: 20px; font-weight: 700">Share the generated campaign URL</span></div>
			  	<div class="panel-body">
			  		<div class="utm_url_div">
			  			<div class="col-md-8 form-group"><textarea class="form-control" id="utm_url" readonly="readonly"></textarea></div>
			  			<div class="col-md-2"><div class="pull-right"><button id="copybtn" class="btn btn-primary" onclick="copyToClipboard()">Copy UTM URL</button></div></div>
			  		</div>
			  		<div class="required_div">
			  			* marked fields are required.
			  		</div>
			  	</div>
			  </div>
 		</div>
 	</div>
 </div>
HTML;
echo $html;