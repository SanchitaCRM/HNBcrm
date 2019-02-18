<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class AccountsViewEdit extends ViewEdit {

    function AccountsViewEdit(){
        parent::ViewEdit();
    }
    function display()
 	{
		parent::display();
        echo <<<EOQ
		<script>
            $(document).ready(function(){
                $("whole_subpanel_project").hide();
            });
        </script>
EOQ;
 	}
}

?>
