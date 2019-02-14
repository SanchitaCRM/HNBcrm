<?php
ini_set('display_errors','on');
//session_start();
include("ldap_auth.php");

//echo $_POST['userLogin'];
//echo $_POST['userPassword'];
// If user logging out
//~ if(isset($_GET['out'])) {  
        //~ session_unset();
        //~ $_SESSION = array();
        //~ unset($_SESSION['user'],$_SESSION['access']);
        //~ session_destroy();
//~ }
//echo $_POST['userPassword'];exit;
// If login form is  submitted
if(isset($_POST['userLogin'])){
        if(ldap_authenticate($_POST['userLogin'],$_POST['userPassword']))
        {
                // if authentication succeded navigate to destination.php
                //header("Location: destination.php");
                
                echo 'hi';
                die();
        } else {
			    
                // authentication failed
                $error = 1;
                
        }
}
if(isset($error)) echo "Login failed: Incorrect userame, password, or permissions<br />";
if(isset($_GET['out'])) echo "Logout successful";
?>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
<form method="post" action="login.php">
<div class="box">
  <style>
  body{
  font-family: 'Open Sans', sans-serif;
  background:#f9f9f9;
  margin: 0 auto 0 auto;
  width:100%;
  text-align:center;
  margin: 20px 0px 20px 0px;
}
p{
  font-size:12px;
  text-decoration: none;
  color:#ffffff;
}
h1{
  font-size:1.5em;
  color:#525252;
}
.box{
  background:white;
  width:300px;
  border-radius:6px;
  margin: 0 auto 0 auto;
  border: #2980b9 4px solid;
}
.username{
  background:#ecf0f1;
  border: #ccc 1px solid;
  border-bottom: #ccc 2px solid;
  padding: 8px;
  width:250px;
  color:#AAAAAA;
  margin-top:10px;
  font-size:1em;
  border-radius:4px;
}
.btn{
  background:#2ecc71;
  width:125px;
  padding-top:5px;
  padding-bottom:5px;
  color:white;
  border-radius:4px;
  border: #27ae60 1px solid;
  margin-top:20px;
  margin-bottom:20px;
  float:center;
  margin-left:16px;
  font-weight:800;
  font-size:0.8em;
}

.btn:hover{
  background:#2CC06B;
}

</style>
<h1>LDAP-SSO-Login</h1>
<input type="text" name="userLogin"   class="username" autofocus />
<input type="password" name="userPassword"   class="username" />
<input type="submit" name="submit" value="Submit" class="btn" />
</div> 
</form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>


