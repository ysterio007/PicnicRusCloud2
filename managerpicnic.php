<html>
<head>
<title>Picnics</title>
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


</style>
</head>

<body>

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
$_SESSION['referrer'] = "managerpicnic.php?ips=".$_GET['ips']."";
ob_start();
header('Location: login.php');
}
?>



<?php


require('globalvar.php');

$pcid=$_SESSION['picnicid'];
$plid=$_SESSION['placeid'];


include('init.php');


include("place.php");

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
//echo "<h1>HERE".$pcid."</h1>";
$result=mysql_query($query,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>"); // query first "SELECT * FROM `picnics`;";


echo "<table id='table1'>";
echo "<tr><th>Place</th><th>Depature time</th><th>Arrive time</th><th>Return time</th><th>Title</th><th>Price</th><th>Transportation</th><th>Capacity</th></tr>";

$vcid="";
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
//$_SESSION['picnicplace']=$row['place'];

echo "<tr><td>";
echo "<a id='reference' href='place.php'>".getplacename($row['place'])."</a>";//1
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

</table>









</body>
</html>