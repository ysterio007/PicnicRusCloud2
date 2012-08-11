<html>


 <head>
 <script type="text/javascript" src="scripts/menuscript.js" ></script>	
<script src="scripts/js/jquery-1.7.2.min.js"></script>
<script src="scripts/js/lightbox.js"></script>
<link href="scripts/css/lightbox.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/style.css"> 
 </head>
 <body>
  <div id="box"><!---Box-->
  
 <div id="topMenu" class="topMenu">
 <ul>
  <li><a href="mainpage.php?main=home">Home</a></li>
  <li><a onclick='showitems(1)' href='javascript: void(0)'>MemberShip</a>

  </li>
  <li><a onclick='showitems(2)' href='javascript: void(0)'>Picnic</a>

  </li>
  <li><a onclick='showitems(3)' href='javascript: void(0)'>About Us</a></li>
    <li><a onclick='showitems(4)' href='javascript: void(0)'>Contact</a></li>
  </ul>
 </div><!--end of tm-->
 <div id="head"><!---header-->

 <!---header<iframe style="z-index:1;position:relative;top:10%;left:0;"src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2F1081443.studentswebprojects.ritaj.ps%2Fmainpage.php&amp;send=false&amp;layout=box_count&amp;width=50&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:50px; height:90px;" allowTransparency="true"></iframe>-->

 <div id="logo"><a rel="lightbox[roadtrip]" href="images/logo.png" ><img src="images/logo.png"  /></a></div><!--rel="lightbox[roadtrip]"-->
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
  <li><a href="mainpage.php?main=home">Home</a></li>
  <li><a href="#">MemberShip</a>
      <ul id="u1">
 <li><a href="mainpage.php?main=login">Login</a></li>
 <li><a href="mainpage.php?main=register">Register</a></li>
 <li><a href="mainpage.php?main=forgetpassword">Forget Passwrod</a></li>
  </ul>
  </li>
  <li><a href="#">Picnic</a>
      <ul id="u2">
 <li><a href="mainpage.php?main=search">Search</a></li>
 <li><a href="mainpage.php?main=view">View</a></li>
 <li><a href="mainpage.php?main=viewreserved">View Reserved</a></li>
  </ul>
  </li>
  <li><a href="mainpage.php?main=aboutus">About Us</a></li>
    <li><a href="mainpage.php?main=contactus">Contact</a></li>
  </ul>
  </div><!---End of navigtion-->

<div id="disp" <?php  if(!checklogin()) {echo "style='overflow:auto;'";}?>><!---display-->

<?php 
if(isset($_GET['main'])){
if($_GET['main']=="home"){
ob_start();
header('Location:mainpage.php');

}

if($_GET['main']=="register")
include('register.php');

if($_GET['main']=="login")
include('login.php');

if($_GET['main']=="search")
include('searchpicnic.php');

if($_GET['main']=="view")
include('viewpicnic.php');


if($_GET['main']=="confirmation")
include('confirmation.php');


if($_GET['main']=="picnic")
include('picnic.php');


if($_GET['main']=="place")
include('place.php');

if($_GET['main']=="exstrastuff")
include('exstrastuff.php');

if($_GET['main']=="registerstep2")
include('registerstep2.php');

if($_GET['main']=="contactus")
include('contactus.php');

if($_GET['main']=="aboutus")
include('aboutus.php');
if($_GET['main']=="picviewer")
include('showplace.php');

}

?>



<!--<img  src="./images/mainpage.jpg" alt="mainpagedesign" />-->

</div><!---End of display-->

	 </div><!---End of content-->
</div><!---End of Box-->

</body>
