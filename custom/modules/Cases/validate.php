/*<script>
    $(document).ready(function(){
      //Customer Phone number
      $('#customer_phone_c').change(function(event){
      var cphone = $(this).val(); 
      phonepattern = /^(\91[\-\s]?)?[0]?(91)?[789]\d{9}$/;
      if(phonepattern.test(cphone)){
          if(cphone.length != 12){              
              $("input#customer_phone_c").after('<p style="color:#ff0000;">Enter valid phone number with prefix 91</p>');
              event.preventDefault(); 
          }             
      } else {
          $("input#customer_phone_c").after('<p style="color:#ff0000;">Invalid phone number</p>');
          event.preventDefault(); 
      }
    });

    //customer aadhar number
    $('#cust_aadhar_c').change(function(event){
      var caadhar = $(this).val(); 
      aadharpattern = /^\d{4}\s\d{4}\s\d{4}$/;
      if(aadharpattern.test(caadhar)){
          if(caadhar.length != 12){             
              $("input#cust_aadhar_c").after('<p style="color:#ff0000;">Enter valid aadhar number</p>');
              event.preventDefault(); 
          }             
      } else {
          $("input#cust_aadhar_c").after('<p style="color:#ff0000;">Invalid aadhar number</p>');
          event.preventDefault(); 
      }
    });

    //customer Email
    /*$('#customer_email_c').change(function(event){
      var cemail = $(this).val(); 
      emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
      if(emailpattern.test(cemail)){
          //if(cemail){             
              $("input#customer_email_c").after('<p style="color:#ff0000;">Enter valid email address</p>');
         // }             
      } else {
          $("input#customer_email_c").after('<p style="color:#ff0000;">Invalid email address</p>');
      }
    });*/

    //PAN number
    $('#customer_pan_no_c').change(function (event) {     
      var PANpattern = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/; 
      var cpan = $(this).val(); 
      if (cpan.length == 10 ) { 
          if( cpan.match(PANpattern) ){ 
            event.preventDefault(); 
          } else {
            $("input#customer_pan_no_c").after('<p style="color:#ff0000;">Enter valid PAN number</p>');
            event.preventDefault(); 
          } 
      } else { 
          $("input#customer_pan_no_c").after('<p style="color:#ff0000;">Please enter for valid PAN number</p>');
          event.preventDefault(); 
      } 
    });

    //Transaction Amount
    $('#customer_pan_no_c').change(function (event) {     
      var transAmount = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
      var transNo = $(this).val(); 
      if(transAmount.test(transNo)) {
        event.preventDefault(); 
      } else {
        $("input#transaction_amount_c").after('<p style="color:#ff0000;">Please enter numbers only</p>');
          event.preventDefault(); 
      }
    }); 
    }); 
</script>*/