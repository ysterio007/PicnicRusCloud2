<?php
include('init.php');
include('globalvar.php');
$t=rtrim($_SESSION['tmp_cnt_id'],"/");
$cn=$_POST['tref2'];
$cd=$_POST['ta'];


$query2012="UPDATE contract
SET contract.`name`='".$cn."',contract.description='".$cd."' 
WHERE contract.id='".$t."' ;";
if($query_run=mysql_query($query2012))
{

ob_start();
   header('Location: contractwizard.php');
    exit;
 
}
?>