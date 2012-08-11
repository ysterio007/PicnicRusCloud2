<?php
require('globalvar.php');




$id=$_GET['id'];


include('init.php');



$query=
"SELECT
place.`name`,
place.description,
place.photo1,
place.photo2,
place.photo3
FROM `place` ".
" WHERE place.id = ".$id.";";



$result=mysql_query($query,$dbcon) or die("<h3 style='color:red;'>error getting data</h3>"); // query first "SELECT * FROM `picnics`;";


$n=$_GET["q"];
$nx=1;
$pr=2;
$photo="photo1";
if($n==1){
$photo="photo1";
$nx=2;
$pr=3;
}
else if($n==2){
$photo="photo2";
$nx=3;
$pr=1;
}
else if($n==3){
$photo="photo3";
$nx=1;
$pr=2;
}

while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{
echo "<table><tr>";
///
echo "<td><div class='divForimg' style='  border-radius:5px 5px 5px 5px; text-align:center; margin:0;padding:0;'>";
echo "<a title=".$row['name']." rel='lightbox[roadtrip]' href=".$row[$photo]."><img id='myimage' class='imageAdapter' src=".$row[$photo]." width=100% height=100% /></a>";

echo "</div>";
echo "</td>";
///
echo "</tr>";
  echo "<tr>";

    	 echo "<td>";
		  echo "<img  src='./images/zback.gif' onclick='showResult(".$pr.",".$id.")'/>";

	echo "<img  src='./images/zforward.gif' onclick='showResult(".$nx.",".$id.")'/>";
       	 echo "</td>";

     echo "</tr>";
echo "</table>";
}

?>

