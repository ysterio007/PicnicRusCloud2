<?php
require('globalvar.php');
$pcid=$_GET['picnic_id_number'];


$_SESSION['picnic_id_number']=$pcid;


ob_start();
header("Location: mainpage2.php?main=viewnumpicnic");
?>