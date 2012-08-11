<html>
<head>
<title>View Num Picnic</title>
<style type="text/css">

#workerLink{

  background:url(images/but1.jpg) repeat-x;
text-decoration:none;
width:90px;
height:30px;
font:28px cursive bold ;
  display: block;
  color:#FFFFFF;
text-shadow:1px 1px 2px  #77A200;
border-radius:10px;
text-align:center;
padding:5px;
margin:5px;

  }
#workerLink:hover{
     background:url(images/but2.jpg) repeat-x;
text-decoration:none;
width:90px;
height:30px;
font:28px cursive bold ;
  display: block;
  color:#FFFFFF;
text-shadow:1px 1px 5px  #000;
border-radius:10px;
text-align:center;
padding:5px;
margin:5px;
}

#table1
{
width: 100%; border: 3px black solid; border-collapse: collapse;
;text-align:center;
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

</style>
</head>

<body>
<h1>View Picnics</h1>


<?php

//connect to the database where $dbcon
require('globalvar.php');
include('init.php');
unset($_SESSION['picnicid']);
if (!$dbcon) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully';
//mysql_close($dbcon);
			   
mysql_select_db($DB_NAME);



$query=
"SELECT 
 picnics.id ,
 picnics.`depature time`, 
 picnics.`arrive time`, 
 picnics.`return time`, 
picnics.capacity,
 picnics.place, 
 picnics.title, 
 picnics.priceperperson 
 FROM `picnics`".
" ORDER BY 
 picnics.id ASC";


$result=mysql_query($query,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>"); // query first "SELECT * FROM `picnics`;";
$num_rows=mysql_num_rows($result);

echo "$num_rows results found";
$stringeod=<<< EOD
<form>
EOD;
echo $stringeod;
echo "<table id='table1'>";
echo "<tr><th>Reference</th><th>Depature time</th><th>Arrive time</th><th>Return time</th><th>Place</th><th>Description</th><th>Price</th><th>Capacity</th><th>select</th></tr>";

while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
echo "<tr><td>";
echo "<a  id='reference' href='showplace.php?myplaceid=".$row['place']."' >".$row['id']."</a>";//1
echo "</td><td>";
echo $row['depature time'];//2
echo "</td><td>";
echo $row['arrive time'];//3
echo "</td><td>";
echo $row['return time'];//4
echo "</td><td>";
echo $row['place'];//5
echo "</td><td>";
echo $row['title'];//6
echo "</td><td>";
echo $row['priceperperson'];//7
echo "</td><td>";
echo $row['capacity'];//7
echo "</td><td>";
echo "<a  id='workerLink' href='"."psessionmanager2.php?picnic_id_number=".$row['id']."' >";
echo "View</a>";
echo "</td></tr>";
}
//TotalNumber

$nusers=0;
if(isset($_SESSION['picnic_id_number'])&&!empty($_SESSION['picnic_id_number']))
{

$query="SELECT SUM(order.numberofpeople) AS TotalNumber FROM `order` where `order`.picnicid=".$_SESSION['picnic_id_number']." ;";
if($query_run=mysql_query($query))
{
$nusers=mysql_result($query_run,0,'TotalNumber');
if($nusers=="")
echo "<h1>Total number of people is : <strong>None<strong></h1>";
else
echo "<h1>Total number of people is : <strong>".$nusers."<strong></h1>";
}
}

echo "</table>";
echo "</form>";
?>

</body>
</html>