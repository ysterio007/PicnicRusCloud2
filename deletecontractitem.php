<?php
include('init.php');
$t=rtrim($_POST['contractreference'],"/");
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['wishID']))
{
$id=rtrim($_POST['wishID'],"/");
//echo $id;
//echo $t;
$query="
delete FROM `contractcontractitem` where
contractcontractitem.contractitemid=".$id."
and contractcontractitem.contractreference='".$t."' ;";

	
//echo $query;
if($query_run=mysql_query($query))
{
if ($_POST["wishID"]!="") {
   header('Location: editcontract.php' );
    exit;
} 
}
}
?>