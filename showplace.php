<html>
<head>
<title>Place</title>
<script src="scripts/js/jquery-1.7.2.min.js"></script>
<script src="scripts/js/lightbox.js"></script>
<link href="scripts/css/lightbox.css" rel="stylesheet" />
<script type="text/javascript" src="scripts/photoalbum.js"></script>
<style type="text/css">

table{
background-color:#ffffff;padding:0;margin:0;
}

th{
width:150px;
text-align:left;
}

.h1
{
font-family:cursive;
border-radius:5px 5px 5px 5px;
background:#ffcc32;
margin:5px 5px 5px 5px;
}
/******************for image box**************/

  #rightdiv{float:right;display:inline;width:50%;border:2px solid #25bbe8;  border-radius:5px 5px 5px 5px;}
  #leftdiv{float:left;display:inline;width:48%;border:2px solid #25bbe8;text-align:center;  border-radius:5px 5px 5px 5px;}
  .imageAdapter
  {
 text-align:center;
  width:385px;
  height:275px;
  }
  .divForimg
  {
  text-align:center;
  border-radius:5px 5px 5px 5px;
  }
  .divForimg:hover
  {
    border-radius:5px 5px 5px 5px;
  border:1px blue solid;
  }
</style>
</head>

<body>



<?php
require('globalvar.php');

if(!isset($_GET['myplaceid']))
{
$id=$_SESSION['placeid'];
}
else
{
$id=$_GET['myplaceid'];//$_SESSION['placeid'];
}



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



while($row=mysql_fetch_array($result,MYSQL_ASSOC))
{


echo "<h1 class='h1' >".$row['name']."</h1>";
echo "<hr/>";
echo "<div id='rightdiv'><h1 class='h1' >Description</h1><p>".$row['description']."</p></div>";
echo "<div id='leftdiv'>";
echo "<table><tr>";
///
echo "<td><div class='divForimg'>";
echo "<a title=".$row['name']." rel='lightbox[roadtrip]' href=".$row['photo1']."><img id='myimage' style='vertical-align:top;'class='imageAdapter' src=".$row['photo1']." width=100% height=100% align=center /></a>";

echo "</div>";
echo "</td>";
///
echo "</tr>";
  echo "<tr>";
    	 echo "<td>";

		  echo "<img  src='./images/zback.gif' onclick='showResult(1,".$id.");'/>";

	echo "<img  src='./images/zforward.gif' onclick='showResult(2,".$id.");'/>";


    	 echo "</td>";
     echo "</tr>";
echo "</table>";
echo "</div>";
}



///}// end of if statement
?>

</body>
</html>