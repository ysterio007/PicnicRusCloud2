<html>


 <head>
 
<link rel="stylesheet" type="text/css" href="css/style2.css"> 
 </head>
 <body>
  <div id="box"><!---Box-->
 <div id="head"><!---header-->

 <div id="logo"><img src="images/logo.png"  /></div>
 <div id="nameAndAddress">
  <h1>Picnic R US</h1>
 <h2 >Ramallah - Palestine</h2>
 </div>
 </div><!---End of header-->
 <div id="hseperator">
 
 <?php
 include('mainpageloader.php');
 if(checklogin())
{
$name=getuserfield('Name');
$_SESSION['user_name']=$name;
printLogin($name,TypeGenerator($_SESSION['user_type']));

}
 ?>
 
 </div>
 <div id="content">
  <div id="nav"><!---navigtion-->
  <ul>
  <li><a href="mainpage2.php?main=home">Home</a></li>
  <li><a href="#">MemberShip</a>
      <ul>
 <li><a href="mainpage2.php?main=login">Login</a></li>
 <li><a href="mainpage2.php?main=register">Register</a></li>
 <li><a href="mainpage2.php?main=forgetpassword">Forget Passwrod</a></li>

  </ul>
  </li>
  <li><a href="#">Picnic</a>
      <ul>
 <li><a href="mainpage2.php?main=addpicnic">Add Picnics</a></li>
 <li><a href="mainpage2.php?main=managerviewpicnic">View Picnics</a></li>
 <li><a href="mainpage2.php?main=viewnumpicnic">Statistics</a></li>
  <li><a href="mainpage2.php?main=contractwizard">Contracts</a></li>
  </ul>
  </li>
  <li><a href="mainpage2.php?main=aboutus">About Us</a></li>
    <li><a href="mainpage2.php?main=contactus">Contact</a></li>
  </ul>
  </div><!---End of navigtion-->

<div id="disp" <?php  if(!checklogin()) {echo "style='overflow:auto;'";}?>><!---display-->

<?php 



if(isset($_GET['main'])){
if($_GET['main']=="home"){
ob_start();
header('Location:mainpage2.php');

}

if($_GET['main']=="register")
include('register.php');

if($_GET['main']=="login")
include('login.php');

if($_GET['main']=="addpicnic")
include('addpicnic.php');

if($_GET['main']=="managerviewpicnic")
include('managerviewpicnic.php');


if($_GET['main']=="viewnumpicnic")
include('viewnumpicnic.php');


if($_GET['main']=="contractwizard")
include('contractwizard.php');



if($_GET['main']=="place")
include('place.php');

if($_GET['main']=="managerpicnic")
include('managerpicnic.php');

if($_GET['main']=="registerstep2")
include('registerstep2.php');


if($_GET['main']=="addcontract")
include('addcontract.php');

if($_GET['main']=="addphotos")
include('addphotos.php');


if($_GET['main']=="editcontract")
include('editcontract.php');




if($_GET['main']=="contactus")
include('contactus.php');

if($_GET['main']=="aboutus")
include('aboutus.php');


}

?>



<!--<img  src="./images/mainpage2.jpg" alt="mainpage2design" />-->

</div><!---End of display-->

	 </div><!---End of content-->
</div><!---End of Box-->

</body>
