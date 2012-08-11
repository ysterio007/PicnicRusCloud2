<html>
<head>
	<title>Extra</title>
<style type="text/css">

.h1
{

font-family:cursive;
border-radius:5px 5px 5px 5px;
background:#ffcc32;
margin:5px 5px 5px 5px;
}


table
{
width: 100%; border: 3px black solid; 
text-align:center;
}
tr:nth-of-type(odd) { background-color: #fff; }


tr:nth-of-type(even) { background-color: #F4F2FB;text-align:center; }

th{background-color: #25BBE8;
color:#FFFFFF;
text-shadow:1px 1px 2px  #000;
font:18px cursive bold ;
text-align:center;
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

.txtLabel
{
text-shadow:1px 1px 2px  #000;
	width:150px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:14px;

	display:inline;
	
}

</style>
</head>

<body>
<h1 class='h1'>Extra Stuff</h1>

<?php


include('init.php');
require('globalvar.php');
$pcid=$_SESSION['picnicid'];
$plid=$_SESSION['placeid'];

$query=
"SELECT * FROM `extrastuff`;";

$result=mysql_query($query,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>"); // query first "SELECT * FROM `picnics`;";
$itemsname=array();
$itemsprice=array();
$ccc=0;
echo "<table>";
echo "<tr><th>Id</th><th>Name</th><th>Price</th></tr>";
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
echo "<tr><td>";
echo $row['id'];//2
echo "</td><td>";
echo $row['name'];//2
echo "</td><td>";
echo $row['price'];//3
echo "</td></tr>";
$itemsname[$ccc++]=$row['name'];
$itemsprice[$ccc++]=$row['price'];
}
echo "</table><br/><br/>";
$ccc=0;
//another fetch
$result=mysql_query($query,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>"); // query first "SELECT * FROM `picnics`;";

echo "<form method='post' action='mainpage.php?main=picnic'>";
echo "<input type='hidden' name='pcid' id='pcid' value='".$pcid."' />";
echo "<input type='hidden' name='isextrasubmitted' id='isextrasubmitted' value='true' />";
echo "<table>";

//while($row=mysql_fetch_array($result,MYSQL_ASSOC))
//{

$single_value1 = implode(',',$itemsname);
$single_value2 = implode(',',$itemsprice);
echo "<input type='hidden' name='name_hv_items' value='".htmlspecialchars($single_value1)."' />";
echo "<input type='hidden' name='price_hv_items' value='".htmlspecialchars($single_value2)."' />";

//}
echo "</tr>";
$result=mysql_query($query,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>"); // query first "SELECT * FROM `picnics`;";


echo "<tr><th>Name</th><th>Quantity</th></tr>";//<th>Checked</th>

while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{


echo "<tr>";
echo   "<td width=30%><label class='txtLabel' >".$row['name']."</label>";
echo "</td><td>";
echo "<input class='numInput' type='text' name='quantity[]' value='0' />";
echo "</td></tr>";



}
echo "</table>";







echo "<br/><hr/><br/>";
echo "<input type='submit' value='Add'/>";
echo "</form>";
?>



</body>
</html>