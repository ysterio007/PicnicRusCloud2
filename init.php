<?php
if(!isset($dbcon)){
$DB_HOST='localhost';
$DB_USER='root';
$DB_PASS='';
$DB_NAME='ahmadhammad1081443';

$dbcon=mysql_connect($DB_HOST,$DB_USER,$DB_PASS);
if (!$dbcon||!mysql_select_db($DB_NAME)) 
{
    die('Could not connect: ' . mysql_error());
}

}
?>
