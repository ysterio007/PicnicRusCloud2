<?php
require('globalvar.php');
$pcid=$_GET['pcid'];
$plid=$_GET['plid'];

$_SESSION['picnicid']=$pcid;
$_SESSION['placeid']=$plid;

ob_start();
header("Location: mainpage2.php?main=managerpicnic");
?>