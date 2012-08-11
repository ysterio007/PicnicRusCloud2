
<?php
require('globalvar.php');
include('init.php');

$v1=$_SESSION['user_id'];
$v2=$_SESSION['picnicid'];
$v3=$_SESSION['numberofpeople'];
$v4=date("Y/m/d");
$v5=$_SESSION['totalCost'];//$totalCost;
$v6=$_SESSION['user_name'];
$v7=0;

$query="INSERT INTO `order`(
`order`.customerid,
`order`.picnicid,
`order`.numberofpeople,
`order`.date,
`order`.Total,
`order`.signature,
`order`.`status`)
VALUES ('".mysql_real_escape_string($v1)
."','".mysql_real_escape_string($v2).
"','".mysql_real_escape_string($v3).
"','".mysql_real_escape_string($v4).
"','".mysql_real_escape_string($v5).
"','".mysql_real_escape_string($v6).
"','".mysql_real_escape_string($v7)."' );";


if($query_run=mysql_query($query)){


echo "Registration Succeed<br/>";
///

$query0="SELECT
eaccount.email
FROM `eaccount` 
WHERE
eaccount.id = ".$v1." ;";

//echo $query0;
if($query_run0=mysql_query($query0)){


$query_num_rows0=mysql_num_rows($query_run0);


if($query_num_rows0==0)
{
echo 'invalid ';
}
else if($query_num_rows0==1)
{
$_SESSION['email']=mysql_result($query_run0,0,'email');
echo $_SESSION['email'];
}
///
}
}
else
{
echo "sorry we could not register you at this time , try again later";
}



$query2="
SELECT
order.id
FROM `order`
WHERE
order.customerid = ".$v1." AND
order.picnicid = ".$v2."
ORDER BY
order.date ASC
LIMIT 1 ;";

//echo $query2;

if($query_run2=mysql_query($query2)){


$query_num_rows=mysql_num_rows($query_run2);


if($query_num_rows==0)
{
echo 'invalid ';
}
else if($query_num_rows==1)
{
//session_start(); 

$order_id=mysql_result($query_run2,0,'id');//this is for query run 2
//echo "<h1>".$order_id."</h1>";
$_SESSION['orderid']=$order_id;



ob_start();
header('Location:order_success.php');
echo "Registration Succeed";

}
}
else
{
echo "sorry we could not register you at this time , try again later";
}









?>