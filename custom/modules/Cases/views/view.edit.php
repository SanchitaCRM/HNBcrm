<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class CasesViewEdit extends ViewEdit {
    function CasesViewEdit() {
       parent::ViewEdit();
    }
  
    function display() {
      $my_variable = 'sanchita';
		  parent::display();
        echo <<<EOQ
		    <script>
          $(document).ready(function(){
            $('#type').change(function(){ 
              var typeText = $('#type :selected').text();                        
              if(typeText == 'Service Request'){
                $("#state").val('Closed');
              }
              if(typeText == 'Complaint'){
                $("#state").val('Open');
                $("#state").prop('disabled',true);
              }
              if(typeText == 'Query'){
                $("#state").val('Closed');
              }
            });
           
            $("#name").prop("readonly", true);
          });
        </script>
EOQ;
 	}
}

?>
