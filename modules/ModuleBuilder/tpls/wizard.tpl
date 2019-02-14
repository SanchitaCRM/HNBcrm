{*
/**
*
* SugarCRM Community Edition is a customer relationship management program developed by
* SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
*
* SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
* Copyright (C) 2011 - 2017 SalesAgility Ltd.
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
*/

*}
<!--
 * Description : This files changes the icons in Studio for all the modules and Subpanels.
 * Date		   : 1-Sep-2018
 * Written By  : Shubham K.	and Swapnil M.   and Roshan S.
-->
{php}
    	/**
    	 * This block gets the icons from the database. Icons are stored in long text so need to unserialize before accessing.
    	 */
		require_once('config.php');
		global $db, $sugar_config;
		$select_query = $db->query("SELECT * FROM module_icons where id='1'");
		$content_row = $db->fetchByAssoc($select_query);
		$icons = unserialize(base64_decode($content_row['icons']));	// it is the array of icons.	
		$this->assign("icons", $icons);
		$this->assign("default_icon",$icons['default']['faicon']);
		$this->assign("default_bg",$icons['default']['bgcolor']);
{/php}

<link href="custom/themes/default/fontawesome-iconpicker/dist/css/fontawesome-iconpicker.min.css" rel="stylesheet">
<div class='wizard' width='100%' >
    <div align='left' id='export'>{$actions}</div>

    <div>{$question}</div>
    <div id="Buttons">
        <table align="center" cellspacing="7" width="90%"><tr>
                {counter start=0 name="buttonCounter" print=false assign="buttonCounter"}

                {foreach from=$buttons item='button' key='buttonName'}

                    {assign var='module_action' value=$button.action}


                    {if $buttonCounter > 5}
                    </tr><tr>
                        {counter start=0 name="buttonCounter" print=false assign="buttonCounter"}
                    {/if}
                    {if !isset($button.size)}
                        {assign var='buttonsize' value=''}
                    {else}
                        {assign var='buttonsize' value=$button.size}
                    {/if}

                    <td {if isset($button.help)}id="{$button.help}"{/if} width="16%" name=helpable" style="padding: 5px;"  valign="top" align="center">
                        <table  onclick='{if $button.action|substr:0:11 == "javascript:"}{$button.action|substr:11}{else}ModuleBuilder.getContent("{$button.action}");{/if}' 
                               class='wizardButton' onmousedown="ModuleBuilder.buttonDown(this);
                                return false;" onmouseout="ModuleBuilder.buttonOut(this);">
                            <tr>
                                <td align="center"><!--<a class='studiolink' href="javascript:void(0)" >							
                                    {if isset($button.imageName)}
                                        {if isset($button.altImageName)}
                                            {sugar_image name=$button.imageTitle width=$button.size height=$button.size image=$button.imageName altimage=$button.altImageName}  
                                        {else}
                                            {sugar_image name=$button.imageTitle width=$button.size height=$button.size image=$button.imageName}                            
                                        {/if}
                                    {else}
                                        {sugar_image name=$button.imageTitle width=$button.size height=$button.size }
                                    {/if}</a>-->
                                    <a class='studiolink' href="javascript:void(0)"  >

                                        {assign var='ic' value=$buttonName}
                                        {assign var='img_title' value=$button.imageTitle}

                                        {php}


												$ic = $this->get_template_vars('ic'); // it gets module name.
												$img_title = $this->get_template_vars('img_title'); // it converts the tpl variable to php
                                                                                                $module_action = $this->get_template_vars('module_action');
$full_sting=array();
$full_sting = explode('=', $module_action);
$exact_module_name = end($full_sting); 
//print_r($ic);
						if (!empty($icons[$exact_module_name]['faicon'])){
								/**
								 * This block of code changes icons of modules dynamically in studio.
								 */
                                 echo '<span class="fa-stack fa-3x" >';
                                 echo '<i class="fa fa-square-o"></i>';
                                 echo '<i style="background-color:'.$icons[$exact_module_name]['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa '.$icons[$exact_module_name]['faicon'].' fa-stack-1x"></i></span>';
                             }elseif(in_array($img_title,array_keys($icons))  && empty($icons[$ic]['faicon'])){
                             	/**
                             	 * this block of code dynamically changes the icons in subpanels.
                             	 */
                                 echo '<span class="fa-stack fa-3x" >';
                                 echo '<i class="fa fa-square-o"></i>';
                                 $myicon = ($icons[$img_title]['faicon'] == '')?$icons['default']['faicon']:$icons[$img_title]['faicon'];
                                 $mybgcolor = ($icons[$img_title]['bgcolor'] == '')?$icons['default']['bgcolor']:$icons[$img_title]['bgcolor'];

                                 echo '<i style="background-color:'.$mybgcolor.';color:#FFFFFF;border-radius:5px" class="fa '.$myicon.' fa-stack-1x"></i></span>';
                             }else{
                                switch ($img_title) {
                                /**
                                 * This block of code hardcodes the icons for some values inside the module like lables,Relationshis etc.
                                 */
                                case 'Labels':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-font fa-stack-1x"></i></span>';
									break;
								case 'Fields':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-list fa-stack-1x"></i></span>';
									break;
								case 'Relationships':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-sitemap fa-stack-1x"></i></span>';
									break;		

								case 'Layouts':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-columns fa-stack-1x"></i></span>';
									break;
								
								case 'Subpanels':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-th fa-stack-1x"></i></span>';
									break;

								case 'EditView':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-pencil fa-stack-1x"></i></span>';
									break;			

								case 'DetailView':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-list-alt fa-stack-1x"></i></span>';
									break;
								
								case 'ListView':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-list fa-stack-1x"></i></span>';
									break;

								case 'QuickCreate':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-magic fa-stack-1x"></i></span>';
									break;
								
								case 'Dashlet':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-table fa-stack-1x"></i></span>';
									break;	

								case 'Popup':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-external-link  fa-stack-1x"></i></span>';
									break;	
								
								case 'BasicSearch':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-filter fa-stack-1x"></i></span>';
									break;	

								case 'SuiteCRM Dashlet ListView':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-th-list fa-stack-1x"></i></span>';
									break;								
								case 'Popup ListView':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-th-list fa-stack-1x"></i></span>';
									break;								
                                case 'SuiteCRM Dashlet Search':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-search fa-stack-1x"></i></span>';
									break;	

                               case 'Popup Search':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-search fa-stack-1x"></i></span>';
									break;	
																
                              	case 'Quick Filter':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-filter fa-stack-1x"></i></span>';
									break;								

                                case 'Advanced Filter':
									echo '<span class="fa-stack fa-3x" >';
									echo '<i class="fa fa-square-o"></i>';
									echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa fa-search-plus  fa-stack-1x"></i></span>';
									break;								
                              	
                                default:
                                /**
                                 * This is a default icon which will get set if the icon is not set for that perticular module.
                                 */
                                 echo '<span class="fa-stack fa-3x" >';
                                 echo '<i class="fa fa-square-o"></i>';
                                 echo '<i style="background-color:'.$icons['default']['bgcolor'].';color:#FFFFFF;border-radius:5px" class="fa '.$icons['default']['faicon'].' fa-stack-1x"></i></span>';
                                    break;
                                }
                             
                             }
                                        {/php}



                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><a class='studiolink' style="font-weight: bolder" id='{$button.linkId}' href="javascript:void(0)">
                                {if (isset($button.imageName))}{$button.imageTitle}{else}{$buttonName}{/if}</a></td>

                    </tr>

                </table>
            </td>
            {counter name="buttonCounter"}
        {/foreach}
    </tr></table>
<!-- Hidden div for hidden content so IE doesn't ignore it -->
<div style="float:left; left:-100px; display: hidden;">&nbsp;
    {literal}
        <style type='text/css'>
            .wizard { padding: 5px; text-align:center; font-weight:bold}
            .title{ color:#990033; font-weight:bold; padding: 0px 5px 0px 0px; font-size: 20pt}
            .backButton {position:absolute; left:10px; top:35px}
        </style>
    {/literal}

    <script>
        ModuleBuilder.helpRegisterByID('export', 'input');
        ModuleBuilder.helpRegisterByID('Buttons', 'td');
        ModuleBuilder.helpSetup('studioWizard', '{$defaultHelp}');
    </script>
</div>
{include file='modules/ModuleBuilder/tpls/assistantJavascript.tpl'}
