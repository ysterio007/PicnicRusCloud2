<?php
//if(isset($_SESSION['referrer'])){
  //header ( "Location: " . $_SESSION['referrer']);//redirect the user
  include('globalvar.php');

echo "<strong>confirmation message that the order has been sent </strong>, an email to ".$_SESSION['email']." including the order number is sent to your email";
echo "<body><br/> <h1>Thank you for registration</h1><br/>";
$name="";
if(!isset($_SESSION['user_name']))
{
$name=$_POST['user_name'];
}
else
{
$name=$_SESSION['user_name'];
}
//${echo "<a href='#'>Activation for the account</a>";}
$body=<<<EOD
Dear {$_SESSION['user_name']} ,

Confirmation message that your order is sent

-----------------

Order ID : {$_SESSION['orderid']}

Thanks

EOD;


 $_SESSION['tmp_email']=$_SESSION['email'];
$_SESSION['mbody']=$body;
echo "<p>".$body."</p>";

//ob_start();
INCLUDE("mailer.php");

?>
<br/>
<br/>

<h1><a href="mainpage.php">Continue to main page</a></h2>