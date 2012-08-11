<?php
include('init.php');
if(isset($_POST['title'])){
$title=$_POST['title'];
$Places=$_POST['Places'];
$activities=$_POST['activities'];
$food=$_POST['food'];

$yt1=$_POST['yt1'];
$mt1=$_POST['mt1'];
$dt1 =$_POST['dt1'];

$st1=$yt1.$mt1.$dt1;
$date1=date('Y-m-j',strtotime($st1));

$yt2=$_POST['yt2'];
$mt2=$_POST['mt2'];
$dt2=$_POST['dt2'];

$st2=$yt2.$mt2.$dt2;
$date2=date('Y-m-j',strtotime($st2));

$yt3=$_POST['yt3'];
$mt3=$_POST['mt3'];
$dt3=$_POST['dt3'];

$st3=$yt3.$mt3.$dt3;
$date3=date('Y-m-j',strtotime($st3));

$transportation=$_POST['transportation'];
$priceperperson=$_POST['priceperperson'];
$children=$_POST['children'];
$disability=$_POST['disability'];
$baby=$_POST['baby'];
$capacity=$_POST['capacity'];
$Contracts=$_POST['Contracts'];


$query="INSERT INTO `picnics`(
picnics.title,
picnics.place,
picnics.activities,
picnics.food,
picnics.`depature time`,
picnics.`arrive time`,
picnics.`return time`,
picnics.transportation,
picnics.priceperperson,
picnics.ischildren,
picnics.isdisability,
picnics.isbaby,
picnics.capacity,
picnics.contractid)
VALUES ('".mysql_real_escape_string($title)
."','".mysql_real_escape_string($Places).
"','".mysql_real_escape_string($activities).
"','".mysql_real_escape_string($food).
"','".mysql_real_escape_string($date1).
"','".mysql_real_escape_string($date2).
"','".mysql_real_escape_string($date3).
"','".mysql_real_escape_string($transportation).
"','".mysql_real_escape_string($priceperperson).
"','".mysql_real_escape_string($children).
"','".mysql_real_escape_string($disability).
"','".mysql_real_escape_string($baby).
"','".mysql_real_escape_string($capacity).
"','".mysql_real_escape_string($Contracts)."' );";

echo $query;
if($query_run=mysql_query($query))
{
ob_start();
header('Location: mainpage2.php');
exit;
}
}
require('globalvar.php');
?>
<a href="<?php $_SESSION['previous_page']?>">Previous Page</a>