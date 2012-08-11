<html>
<head>
<title>View Picnic</title>


 <style type="text/css">
#bookLink{

  background:url(images/but1.jpg) repeat-x;
text-decoration:none;
width:150px;
height:40px;
font:28px cursive bold ;
  display: block;
  color:#FFFFFF;
text-shadow:1px 1px 2px  #77A200;
border-radius:10px;
text-align:center;
padding:5px;
margin:5px;

  }
#bookLink:hover{
     background:url(images/but2.jpg) repeat-x;
text-decoration:none;
width:150px;
height:40px;
font:28px cursive bold ;
  display: block;
  color:#FFFFFF;
text-shadow:1px 1px 5px  #000;
border-radius:10px;
text-align:center;
padding:5px;
margin:5px;
}

th{background-color: #25BBE8;
color:#FFFFFF;
text-shadow:1px 1px 2px  #000;
font:18px cursive bold ;
}
table
{
width: 100%; border: 3px black solid; border-collapse: collapse;
}
tr:nth-of-type(odd) { background-color: #ccc; }


tr:nth-of-type(even) { background-color: #F4F2FB; }


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
#mytable{
width:100%;
text-align:center;
}	
	/********************************************************************/
	










    </style>


</head>

<body>
<h1>View Picnics</h1>


<?php

//connect to the database where $dbcon
require('globalvar.php');
include('init.php');
unset($_SESSION['picnicid']);
unset($_SESSION['placeid']);
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
echo "<table id='mytable'>";
echo "<tr><th>Reference #</th><th>Depature time</th><th>Arrive time</th><th>Return time</th><th>Place</th><th>Description</th><th>Price</th><th>Select</th></tr>";

while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
echo "<tr><td>";
echo "<a id='reference' href='"."psessionmanager.php?pcid=".$row['id']."&plid=".$row['place']."' >".$row['id']."</a>";//1
echo "</td><td>";
echo $row['depature time'];//2
echo "</td><td>";
echo $row['arrive time'];//3
echo "</td><td>";
echo $row['return time'];//4
echo "</td><td>";
echo getplacename($row['place']);//5
echo "</td><td>";
echo $row['title'];//6
echo "</td><td>";
echo $row['priceperperson'];//7
echo "</td><td>";
echo "<a id='bookLink' href='"."psessionmanager.php?pcid=".$row['id']."&plid=".$row['place']."' >";
echo "View</a>";
echo "</td></tr>";
}

echo "</table>";
echo "</form>";
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

</body>
</html>