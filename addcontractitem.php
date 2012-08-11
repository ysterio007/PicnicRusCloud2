<?php
include('init.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['wishID2']))
{
$t=rtrim($_POST['contractreference'],"/");
$id=rtrim($_POST['wishID2'],"/");

$query="
INSERT INTO contractcontractitem(contractreference,contractitemid) 
 VALUES('".$t."','".$id."');";
echo "This ITEM IS EXIST IN THIS CONTRACT <a href='".$_SERVER['HTTP_REFERER']."'>Back to contract</a>";
//echo $id;
//echo $t;
if($query_run=mysql_query($query))
{
if ($_POST["wishID2"]!="") {
   header('Location: editcontract.php' );
    exit;
} 
}
}
?>