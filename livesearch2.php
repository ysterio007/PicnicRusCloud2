<?php
require('globalvar.php');





include('init.php');
$q=$_GET['q'];
//
$sql="SELECT
picnics.id as pcid,
place.id as plid,
place.`name`
FROM
picnics ,
place
WHERE
place.`name` "." LIKE '%".$q."%'".
 " AND
place.id = picnics.id ORDER BY 
place.`name` ASC";

$result = mysql_query($sql,$dbcon);
$hint="";
$c=0;
while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
if($c==0){
$hint=$hint . "<table>";
}
$hint=$hint . "<tr><td><a href='psession.php?pcid=".$row["pcid"]."&plid=".$row["plid"].

        "' >" .
       $row["name"]. " </a></td></tr>";
	   $c++;
}//target='_blank'
if($c!=0){
$hint=$hint ."</table>";
$c=0;
echo $hint;
}
?>
