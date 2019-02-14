{php}
global $db, $sugar_config,$current_user;
{/php}


<div class="gen_his_acti_side_pane">
    <div class="intel_pane_container">
        <div id="intel_pane_container_data">
          
            <div id="detail_values" class="row">
            </div>

        </div>
    </div>
</div>
<!--Generic History and Activities Panel-->
{literal}
  
    <script type="text/javascript">
                  
                     function GetDetailViewDeta(x) {
                         var stuff = x.data('stuff');
                        
                         $(".gen_his_acti_side_pane").addClass("show_side_pane");
                          $.ajax({
                            url: 'index.php?entryPoint=activities_detailview',
                            data: {stuff:stuff},
                            type: 'post',
                            success: function (data) {
                                var obj = data;
                                $('#detail_values').html(obj);

                            }
                        });

                         
                     }


                   
    </script>
{/literal}
