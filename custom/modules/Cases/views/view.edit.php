<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class CasesViewEdit extends ViewEdit {
    function CasesViewEdit() {
       parent::ViewEdit();
    }

    function display() {
		  parent::display();
        echo <<<EOQ
		    <script>
          $(document).ready(function(){
            $('#type').change(function(){ 
              var typeText = $('#type :selected').val();   
              if(typeText == 'Minor_Defect'){
                $("#state").val('Closed');
                $("#status").html('<option value="Closed_Closed">Closed</option>');
                $("#state").prop('disabled',false);
                addToValidate('EditView','resolution','TextArea',true,'{$mod_strings['LBL_RESOLUTION']}');
                $('#resolution_label').html('{$mod_strings['LBL_RESOLUTION']}Resolution: <font color="red">*</font>');
                //$("#resolution_label").append('<span class="required">*</span>');
                $("#resolution,#description").parent().parent().show();
              }
              if(typeText == 'Change_Request'){
                $("#state").val('Open');
                $("#state").prop('disabled',true);
                $("#status").html('<option value="Open_New">New</option><option value="Open_Assigned">Assigned</option><option value="Open_Pending Input">Pending Input</option>');
                $("#resolution,#description").parent().parent().show();
                removeFromValidate('EditView','resolution');                       
                $('#resolution_label').html('{$mod_strings['LBL_RESOLUTION']}Resolution: ');
              }
              if(typeText == 'Pre_Sales_Related'){
                $("#state").val('Closed');
                $("#status").html('<option value="Closed_Closed">Closed</option>');
                $("#state").prop('disabled',false);
                $("#resolution,#description").parent().parent().hide();
              }
            });
           
            $("#name").prop("readonly", true);
          });
        </script>
EOQ;
 	}
}

?>
