<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirmation and Payment</title>
<SCRIPT TYPE="text/javascript" src="scripts/formval.js" ></script>


 <style type="text/css">

#ul1 { 
list-style-image: url("images/ar1.jpg");
position:relative;
left:30px;

}

#ul1 #ul2 { 
list-style-image: url("images/ar2.jpg");

width:100%;
 }

.myol{
margin:0 0 0 20px;
/*dir='rtl' xml:lang='ar' lang='ar' width=100% list-style:-moz-arabic-indic;>*/
}

#sign:focus{
background:#dcfcc5;
}

.redSign
{
background:red;
}
</style>


</head><body>

<NOSCRIPT>

<P> Javascript is not currently enabled on your browser. If you can enable it, your input will be checked as you enter it (on most browsers, at least). You may find this helpful. </P>

</NOSCRIPT>


<form onsubmit="return validateOnSubmit3(this)" action=<?php echo $_SERVER['PHP_SELF'] ;?> method='post'>

<?php


summery();

include('payment.php');

function summery()
{
$placename="";
$price="";
$generalCost=0;
$extraCost=0;
$totalCost=0;
require('globalvar.php');
include('init.php');
$id=$_SESSION['picnicid'];

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
picnics.isdisability
FROM `picnics`
WHERE picnics.id = ".$id." ;";

$result=mysql_query($query,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>"); // query first "SELECT * FROM `picnics`;";

include('globalvar.php');
 $my_array1=array();
 $my_array2=array();
 $quantities=array();
if(isset($_SESSION['quantities'])){
$quantities=$_SESSION['quantities'];
$my_array1= explode(",",$_SESSION['name_hv_items']);
 $my_array2= explode(",",$_SESSION['price_hv_items']);
}

echo "<div style='border:10px;'>";
echo "<table width=100% border=2>";
echo "<th>Summary</th>";
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
$placename=$row['place'];
$price=$row['priceperperson'];
echo "<tr><td>
<ul id='ul1'>
<li><strong>Title</strong>	:  ".$row['title']."</li>
<li><strong>Place</strong>	:  ".$row['place']."</li>
<li><strong>Depature time</strong>	:  ".$row['depature time']."</li>
<li><strong>Arrive time</strong>	:  ".$row['arrive time']."</li>
<li><strong>Return time</strong>	:  ".$row['return time']."</li>
<li><strong>Transportation</strong>	:  ".$row['transportation']."</li>
<li><strong>Capacity</strong>	:  ".$row['capacity']."</li>
<li><strong>Activities</strong>	:  ".$row['activities']."</li>
<li><strong>Food</strong>	:  ".$row['food']."</li>";
}
echo "<li><strong>Description</strong><br/><div style='border:10px;'>".getDescription($placename)."</div></li>
<li><strong>Number of people</strong>	:  ".numberofpeople()."</li>
<li style='display:block'>".
"<div style='border:10px; width:100% '>".
"<table  border=2>".
"<th>Name</th><th>Price</th><th>Number</th><th>Total</th>
<tr>
<td>General Cost</td>
<td>".$price."</td>
<td>".numberofpeople()."</td>
<td>".$generalCost=($price*numberofpeople())."</td>
</tr>";
for($i=0;$i<count($my_array1);$i++)
{
if(isset($quantities[$i]) && $quantities[$i]>0){
echo "<tr>". "<td>".$my_array1[$i]."</td><td>".$my_array2[$i]."</td><td> ".$quantities[$i]." </td><td>".CalculateExtra($my_array2[$i],$quantities[$i])."</td></tr>";
$extraCost+=CalculateExtra($my_array2[$i],$quantities[$i]);
}
}
echo "</table>

</li>
</div>
<li><strong>Total : </strong>".sprintf("%.2f",($totalCost=($extraCost+$generalCost)))." $</li>
</ul>
</td></tr>
</table>";
$_SESSION['totalCost']=$totalCost;
}




function yesorno($v){
if($v==1)
{
return "Yes";
}
else
return "No";
}
function getDescription($pn)
{

include('init.php');



$query2="
SELECT
place.description
FROM `place`
WHERE
place.`id` = '".$pn."' ;";

//echo $query2;

$query_run=mysql_query($query2);



$p=mysql_result($query_run,0,'description');


return $p;
}
function CalculateExtra($c1,$c2){return $c1*$c2;}
function numberofpeople()
{
$v=1;
if(isset($_SESSION['number'])){
$v=$_SESSION['number'];
require('globalvar.php');
$_SESSION['numberofpeople']=$v;
return $v;
}
else
{
return $_SESSION['numberofpeople'];
}
}


?>

<?php

//connect to the database where $dbcon
//include('init.php');
include('init.php');
if (!$dbcon) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully';
//mysql_close($dbcon);
			   include('globalvar.php');
mysql_select_db($DB_NAME);
$contractid=$_SESSION['contractid'];

$query2="SELECT
contractitem.`name`
FROM
contractitem ,
contractcontractitem
WHERE
contractitem.id = contractcontractitem.contractitemid AND
contractcontractitem.contractreference = '".$contractid."' ;";

//echo $query2;
$result2=mysql_query($query2,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>");
$io=1;
echo "<table width=100% border=10><th>Contract items as order list</th><tr><td>";
echo "<ol cLass='myol' >";
while($row=mysql_fetch_array($result2,MYSQL_ASSOC))
{


echo "<li>".($io++).". ".$row['name'].".</li><hr />";


}
echo "</ol>";
echo "</td></tr></table>";



//$timestamp = strtotime($criteria);
//$criteria2=date("Y/m/d", $timestamp);

?>

<?php
if (isset($_POST['agree']) && isset($_POST['sign']) &&!empty($_POST['sign'])
&& isset($_POST['txtCardNumber']) &&!empty($_POST['txtCardNumber']) )
{
if($_POST['agree']=='true')
{
$_SESSION['user_name']=$_POST['sign'];
//header('Location: mainpage.php');
include('ordergenerator.php');
}
else
echo "<p color=red>you not have set the check box or signature</p>";
}
?>


<div style="text-align:center;border:1px solid;"><p><input type='checkbox' name='agree' value='true' /> I agree with contract items and conditions</p></div>
<p><input type='submit' value='Regsiter' /></p>
<p>
<h2>Signature</h2>
<p> Custumer Signature <input id="sign" type='text' name='sign' value='<?php require('globalvar.php'); if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}else echo ""; ?>'  /></p>
<p> Current Date : <?php echo date("Y/m/d");?></p>

</form> 
</body>
</html>