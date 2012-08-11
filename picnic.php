<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Picnic</title>
<script type="text/javascript" src="scripts/tableformater.js"></script>
<script src="scripts/js/jquery-1.7.2.min.js"></script>
<script src="scripts/js/lightbox.js"></script>
<link href="scripts/css/lightbox.css" rel="stylesheet" />


 <style type="text/css">
.h1
{

font-family:cursive;
border-radius:5px 5px 5px 5px;
background:#ffcc32;
margin:5px 5px 5px 5px;
}


#table1
{
width: 100%; border: 3px black solid; border-collapse: collapse;

}
tr:nth-of-type(odd) { background-color: #fff;text-align:center;}


tr:nth-of-type(even) { background-color: #F4F2FB; }

th{background-color: #25BBE8;
color:#FFFFFF;

text-shadow:1px 1px 2px  #000;
font:18px cursive bold ;

}

#reference {
	border-bottom:1px solid #cccccc;
	padding-bottom: 2px; 
}
#reference:visited {
	color: #09C;
	text-decoration: none;
}
#reference:hover {
	color: #333333;
	border-bottom:3px solid #AD3417;
	padding-bottom: 2px;
	text-decoration: none;
}
#reference:active {
	color: #006;
	text-decoration: none;
}
#reference:link {
	text-decoration: none;
	}

p
{

font-family:cursive;
border-radius:2px 2px 2px 2px;
background:url(images/paragraph.png) repeat-x;
margin:5px 5px 5px 5px;	
}


.numInput {
	width:150px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	padding:7px 8px;
	margin:0;
	display:inline;
	border-radius:5px 5px 5px 5px;
/*	border-top-right-radius:20px 10px;*/
	background:#E9E9E9;
	border:1px solid #CCC;	
}

.numInput:focus
{
	width:150px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	padding:7px 8px;
	margin:5px;
	display:inline;
	border-radius:5px 5px 5px 5px;
/*	border-top-right-radius:20px 10px;*/
	background:#fff;
	border:1px solid #CCC;	
	text-shadow:1px 1px 2px  #000;
}

.numLabel
{
text-shadow:1px 1px 2px  #000;
	width:150px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	padding:7px 8px;
	margin:5px;
	display:inline;
	border-radius:5px 5px 5px 5px;

	border:1px solid #FFCC32;	
}

.extraimage:hover
{
background:#ffcc32;

}

#ResterDiv
{
clear:both;
}

</style>


</head><body>

<?php
require('checklogin.php');
require('globalvar.php');
$_SESSION['contractid']="";
if(checklogin()){
//echo "You are already registered and logged in <a href='logout.php'>logout</a>";
//do nothing

?>

<?php
}else if(!checklogin()){

   // session_start(); 
$_SESSION['referrer'] = "mainpage.php?main=picnic";
ob_start();
header('Location: mainpage.php?main=login');
}
?>



<?php


require('globalvar.php');

$pcid=$_SESSION['picnicid'];
$plid=$_SESSION['placeid'];


include('init.php');


include("place.php");
echo "<div id='ResterDiv'><hr/></div>";
$query=
"SELECT
picnics.place,
picnics.`depature time`,
picnics.`arrive time`,
picnics.`return time`,
picnics.title,
picnics.priceperperson,
picnics.activities,
picnics.food,
picnics.transportation,
picnics.capacity,
picnics.isbaby,
picnics.ischildren,
picnics.isdisability,
picnics.contractid
FROM `picnics`
WHERE picnics.id = ".$pcid." ;";
//echo "<h1 class='h1' >HERE".$pcid."</h1 class='h1' >";
$result=mysql_query($query,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>"); // query first "SELECT * FROM `picnics`;";


echo "<table id='table1'>";
echo "<tr><th>Place</th><th>Depature time</th><th>Arrive time</th><th>Return time</th><th>Title</th><th>Price</th><th>Transportation</th><th>Capacity</th></tr>";
$capacity=0;
$vcid="";
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
//$_SESSION['picnicplace']=$row['place'];
$capacity=$row['capacity'];
echo "<tr><td>";
echo "<a id='reference' href='showplace.php' target='_blank'>".getplacename($row['place'])."</a>";//1
echo "</td><td>";
echo $row['depature time'];//2
echo "</td><td>";
echo $row['arrive time'];//3
echo "</td><td>";
echo $row['return time'];//4
echo "</td><td>";
echo $row['title'];//5
echo "</td><td>";
echo $row['priceperperson'];//6
echo "</td><td>";
echo $row['transportation'];//9
echo "</td><td>";
echo $row['capacity'];//10
echo "</td></tr>";
echo "</table>";
echo "<hr/>";
echo "<p><h1 class='h1' >Activities</h1 class='h1' >";
echo "<p class='myparag'>".$row['activities']."</p>";//7
echo "</p>";

echo "<p><h1 class='h1' >Food</h1 class='h1' >";
echo "<p class='myparag'>".$row['food']."</p>";//8
echo "</p>";
echo "<p><h1 class='h1' >Children</h1 class='h1' >";
echo "<p class='myparag'>".yesorno($row['ischildren'])."</p>";//9
echo "</p>";
echo "<p><h1 class='h1' >Baby</h1 class='h1' >";
echo "<p class='myparag'>".yesorno($row['isbaby'])."</p>";//10
echo "</p>";
echo "<p><h1 class='h1'  class='h1 class='h1' ' >Disibility</h1 class='h1' >";
echo "<p class='myparag'>".yesorno($row['isdisability'])."</p>";//11
echo "</p>";
echo "<hr/>";
$vcid=$row['contractid'];
}
//echo "<h1 class='h1' >this".$vcid.")</h1 class='h1' >";
include('globalvar.php');
$_SESSION['contractid']=$vcid;
echo "<form action='mainpage.php?main=picnic' method='post'>".
"<fieldset><legend>Extra Requirement : </legend><a class='extraimage' href='mainpage.php?main=exstrastuff'  ><img src='./images/extra.jpg' alt='AddExtra' /></a></fieldset><br />".
"<label id='info_numberofusers' class='numLabel' for='number'>Number OF People : </label><input class='numInput' type='text' name='number' id='number' value='1' onkeyup='updateNNN(this.value)' />".
"<input style='
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;
	padding:7px 8px;
	margin:5px;
	display:inline;
	text-shadow:1px 1px 2px  #000;
' type='submit' value='sumbit' name='sumbit' id='sumbit'/>".
"</form>";

///}// end of if statement
function yesorno($v){
if($v==1)
{

return "<img src='images/yes.jpg' alt='Yes' width=32 hight=32>";
}
else
return "<img src='images/no.jpg' alt='NO' width=32 hight=32>";
}

function getplacename($r){
$query="SELECT
place.`name`,
place.id
FROM `place` 
WHERE
place.id=".$r." ;";

if($query_run=mysql_query($query))
{
return mysql_result($query_run,0,'name');
}
}
?>







<?php

if(isset($_POST['isextrasubmitted']))
{
//connect to the database where $dbcon ips=1&isextrasubmmited=true&quantity1=66&cbx1=on&quantity2=66&cbx2=on
//include('init.php');
if(isset($_POST['pcid']))
//echo $_GET['ips'];
if(isset($_POST['quantity'])){
//ob_start();
//header("Location: ".$_SERVER['PHP_SELF']."#brands");
/*
$mysize=count($_GET['quantity']);
$i=0;
$j=0;
$dim=array();
for($i=0;$i<$mysize;$i++)
for($j=0;$j<4;$j++){
$dim=array($i=>array($j));
}
*/
$keys=array();
$values=array();
$quantities=$_POST['quantity'];
include('globalvar.php');
$_SESSION['name_hv_items']=$_POST['name_hv_items'];
$_SESSION['price_hv_items']=$_POST['price_hv_items'];
$_SESSION['quantities']=$quantities;
$my_array1= explode(",",$_POST['name_hv_items']);
 $my_array2= explode(",",$_POST['price_hv_items']);



echo "<table>";
echo "<tr><th>Item</th><th>Price</th><th>Quantity</th><th>Total</th></tr>";

for($i=0;$i<count($my_array1);$i++)
{
if($quantities[$i]>0){
echo "<tr>". "<td>".$my_array1[$i]."</td><td>".$my_array2[$i]."</td><td> ".$quantities[$i]." </td><td>".CalculateTotal($my_array2[$i],$quantities[$i])."</td></tr>";

}
}

echo "</table>";




}
}
function CalculateTotal($v1,$v2){return $v1*$v2;}

if(isset($_POST['number'])&&!empty($_POST['number']))
{
$query="SELECT SUM(order.numberofpeople) AS TotalNumber FROM `order` where `order`.picnicid=".$pcid." ;";
if($query_run=mysql_query($query))
{
$nposted=$_POST['number'];
$nusers=mysql_result($query_run,0,'TotalNumber');

//echo "<h1 class='h1' >Total number of people is : <strong>".$nusers."<strong></h1 class='h1' >";

$available=$capacity-$nusers;

if($nposted<=$available && ($nposted+$nusers)<=$capacity )
{
$_SESSION['number']=$nposted;
ob_start();
header("Location: mainpage.php?main=confirmation");
}
else
{
if($available>0){
echo "<p><i>* you must enter number of people less than <strong>".($available+1)."</strong> because <strong>".$available."</strong> chairs are available </i></p>";
}
else
{
echo "<p><i> * Sorry the picnic is full you can pick other picnec <strong></strong> </i></p>";
}
}


}


}
?>









</body>
</html>