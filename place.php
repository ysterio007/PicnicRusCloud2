<html>
<head>
<title>Place</title>
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
div.divForimg img
  {
  display:inline;
  margin:3px;
  border:1px solid #ffffff;
    margin:0px;
  }
div.divForimg a:hover img
  {
  border:2px solid #25bbe8;
  }
div.desc
  {
  border-radius:5px;
  background:#25bbe8;
  text-align:center;
  font-weight:normal;
  width:180px;
  margin:0px;
  position:relative;
  bottom:75px;
  }
</style>
</head>

<body>



<?php
require('globalvar.php');


$id=$_SESSION['placeid'];


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
echo "<h1 class='h1' >Description</h1>";
echo "<p>".$row['description']."</p>";
echo "<table>";
echo "<tr>";
///
echo "<td><div class='divForimg'>";
echo "<a rel='lightbox[roadtrip]' title=".$row['name']." href=".$row['photo1']."><img class='imgColor' src=".$row['photo1']." width=250px height=250px /></a>";
echo "<div class='desc'>The description of this place gonna be here</div>";
echo "</div>";
echo "</td>";
///
///
echo "<td><div class='divForimg'>";
echo "<a rel='lightbox[roadtrip]' title=".$row['name']." href=".$row['photo2']."><img class='imgColor' src=".$row['photo2']." width=250px height=250px /></a>";
echo "<div class='desc'>The description of this place gonna be here</div>";
echo "</div>";
echo "</td>";
///
///
echo "<td><div class='divForimg'>";
echo "<a rel='lightbox[roadtrip]' title=".$row['name']." href=".$row['photo3']."><img class='imgColor' src=".$row['photo3']." width=250px height=250px /></a>";
echo "<div class='desc'>The description of this place gonna be here</div>";
echo "</div>";
echo "</td>";
///
echo "</tr>";

echo "</table>";
}



///}// end of if statement
?>

</body>
</html>