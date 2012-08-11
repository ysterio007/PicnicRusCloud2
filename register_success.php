<?php
//if(isset($_SESSION['referrer'])){
  //header ( "Location: " . $_SESSION['referrer']);//redirect the user
  include('globalvar.php');

echo "<strong>confirmation message that the registration succeed </strong>, an email to ".$_SESSION['tmp_email']." including the username and password and activation is sent to your email";
echo "<body><br/> <h1>Thank you for registration</h1><br/>";
//${echo "<a href='#'>Activation for the account</a>";}
$body=<<<EOD
Dear {$_SESSION['tmp_name']} ,

Confirmation message that the registration succeed 

-----------------

Username : {$_SESSION['tmp_un']}
           
Password : {$_SESSION['tmp_up']}

User ID  :  {$_SESSION['userid']}

EOD;



$_SESSION['mbody']=$body;
echo "<p>".$body."</p><br />";

//ob_start();
include("mailer.php");
$_SESSION['referer']="register_success.php";
?>
<br/>
<br/>

<h1><a href="mainpage.php">Continue to main page</a></h2>