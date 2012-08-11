<?php
require('globalvar.php');
include('init.php');

//connect to the database where $dbcon
include('init.php');

if (!$dbcon) {
    die('Could not connect: ' . mysql_error());
}

			   
mysql_select_db($DB_NAME);

$limit=$_GET['limit'];//2;
$offset=$_GET['offset'];//0
$q=$_GET['q'];//silwad
$orderby=$_GET['ob'];//id
//$orderby="picnics.id";
$AD=$_GET['ad'];//ASC
//$AD="ASC";
//----------------------------------------------------------------------------

 $qn="SELECT
count(*)
FROM
picnics ,
place
WHERE
picnics.place = place.id AND
place.`name` "." LIKE '%".$q."%' ";

$res=mysql_query($qn,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>"); // query first "SELECT * FROM `picnics`;";
   $query_data = mysql_fetch_row($res);
$total_num_picnics = $query_data[0];

$number_of_pages= ceil($total_num_picnics/$limit);

$currentpage=1;

//echo "<h1>".$number_of_pages."</h1>";
//if($orderby=="id")
//{
$query=
"SELECT
picnics.id,
picnics.`depature time`,
picnics.`arrive time`,
picnics.`return time`,
picnics.place,
picnics.title,
picnics.priceperperson

FROM
picnics";

$query=$query." ORDER BY picnics.id ".$AD;
$query=$query." LIMIT ".$limit;
$query=$query." OFFSET ".$offset;
//}
if($orderby=="place")
{
$query=
"SELECT
picnics.id,
picnics.`depature time`,
picnics.`arrive time`,
picnics.`return time`,
picnics.place,
picnics.title,
picnics.priceperperson,
place.`name`
FROM
picnics ,
place
WHERE
picnics.place = place.id AND
place.`name` "." LIKE '%".$q."%' ";

$query=$query." ORDER BY place.`name` ".$AD;
$query=$query." LIMIT ".$limit;
$query=$query." OFFSET ".$offset;
}
else if($orderby=="depature time" ||$orderby=="arrive time"||$orderby=="return time" )
{
$query=
"SELECT
picnics.id,
picnics.`depature time`,
picnics.`arrive time`,
picnics.`return time`,
picnics.place,
picnics.title,
picnics.priceperperson
FROM
picnics";



$query=$query." ORDER BY picnics.`".$orderby."` ".$AD;
$query=$query." LIMIT ".$limit;
$query=$query." OFFSET ".$offset;
}
else if($orderby=="title")
{
$query=
"SELECT
picnics.id,
picnics.`depature time`,
picnics.`arrive time`,
picnics.`return time`,
picnics.place,
picnics.title,
picnics.priceperperson
FROM
picnics
WHERE
picnics.".$orderby." LIKE '%".$q."%' ";

$query=$query." ORDER BY ".$orderby." ".$AD;
$query=$query." LIMIT ".$limit;
$query=$query." OFFSET ".$offset;
}

else if($orderby=="priceperperson")
{
$query=
"SELECT
picnics.id,
picnics.`depature time`,
picnics.`arrive time`,
picnics.`return time`,
picnics.place,
picnics.title,
picnics.priceperperson
FROM
picnics";

$query=$query." ORDER BY ".$orderby." ".$AD;
$query=$query." LIMIT ".$limit;
$query=$query." OFFSET ".$offset;
}

$result=mysql_query($query,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>"); // query first "SELECT * FROM `picnics`;";
$num_rows=mysql_num_rows($result);

//echo "$num_rows results found";

echo "<table id='mytable'>";
echo "<tr><th><a href='javascript:void(0);' onclick='showTable(".($limit).",0,0,0)'>Reference #</a></th><th><a href='javascript:void(0);' onclick='showTable(".($limit).",0,1,0)'>Depature time</a></th><th><a href='javascript:void(0);' onclick='showTable(".($limit).",0,2,0)'>Arrive time</a></th><th><a href='javascript:void(0);' onclick='showTable(".($limit).",0,3,0)'>Return time</a></th><th><a href='javascript:void(0);' onclick='showTable(".($limit).",0,4,0)'>Place</a></th><th><a href='javascript:void(0);' onclick='showTable(".($limit).",0,5,0)'>Description</a></th><th><a href='javascript:void(0);' onclick='showTable(".($limit).",0,6,0)'>Price</a></th><th>Select</th></tr>";

while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
echo "<tr><td>";
echo "<a  id='reference' href='"."psession.php?pcid=".$row['id']."&plid=".$row['place']."' >".$row['id']."</a>";//1
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
echo "<a id='bookLink' href='"."psession.php?pcid=".$row['id']."&plid=".$row['place']."' >";
echo "book</a>";
echo "</td></tr>";
}

echo "</table>";
echo "<div id='pagination'>";

echo "<ul>";
echo "<li><a href='javascript:void(0);' onclick='showTable(".($limit).",".(0)*$limit.",0,0)'>First</a></li>";
echo "<li><a href='javascript:void(0);'>Prev</a></li>...";

//$offset=(($i+1)-1)*$limit; 
for($i=0;$i<$number_of_pages;$i++)
{
echo "<li><a href='javascript:void(0);' onclick='showTable(".($limit).",".(($i+1)-1)*$limit.",0,0)'>".($i+1)."</a></li>";
}
echo "...<li><a href='javascript:void(0);'>Next</a></li>";
echo "<li><a href='javascript:void(0);' onclick='showTable(".($limit).",".($number_of_pages-1)*$limit.",0,0)'>Last</a></li>";
echo "</ul>";

echo "</div>";





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