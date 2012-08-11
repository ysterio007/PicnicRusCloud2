<html>
	<head>

	<script type='text/javascript'>
	function loadCake()
	{
	document.getElementById('currentpage').innerHTML=document.title;
	}
	</script>
	<style type="text/css">

#header3{float:right;margin:3px;border-bottom:1px solid #ccc; background-color:#fff; line-height: 20px; overflow:auto; font-size:11px; font-weight:bold; }
#header3 a { padding:0 24px 2px 0;color:red; background:transparent url(images/blue-arrow.png) no-repeat right center;}
#header3 a:link{ text-decoration:none; color:#003366; }
#header3 a:hover{ color:#0099CC; }
ul, li { list-style-type:none; padding:0; margin:0; }
#breadcrumbs {margin:3px; float:left;border-bottom:1px solid #ccc; background-color:#fff; line-height: 20px; overflow:auto; font-size:11px; font-weight:bold; }
#breadcrumbs li { float:left; padding-left:8px; }
#breadcrumbs li a { padding:0 24px 2px 0; background:transparent url(images/blue-arrow.png) no-repeat right center;}
#breadcrumbs li a:link, #breadcrumbs li a:visited { text-decoration:none; color:#003366; }
#breadcrumbs li a:hover, #breadcrumbs li a:focus { color:#0099CC; }
#breadcrumbs li {color:#FF9900;margin-right:5px;}

	</style>
	
	</head>
	<body onLoad="loadCake();">
<?php
$isManage=false;

function ppp()
{
global $isManage;
if($isManage){return "mainpage2.php";}else{return "mainpage.php";}

}
function printLogin($name,$v6)
{
//echo "<h3>You are logged in ".$name." as a ".$v6." <a href='logout.php'>logout</a></h3>";
echo 
"<ul id='breadcrumbs'>
<li><a href='".ppp()."'>Home</a></li>
<li><a href='#'>Ahmad Hammad</a></li>
<li><a href='#'>Picnic R Us</a></li>
<li id='currentpage'>123</li>
</ul><h4 id='header3'><a href='logout.php'>Logout</a></h4>";//<!--</ul><h4 id='header3'>".$name." <a href='logout.php'>Logout</a></h4>";-->
}

//ini_set('display_errors', 1);
if(isset($_SESSION['referer'])){
if($_SESSION['referer']=="register_success.php")
{
session_destroy();
header('Location: '.$_SERVER['HTTP_REFERER']);
}
}
require('globalvar.php');
require('checklogin.php');
require('init.php');

function getuserfield($field)
{
$query="
SELECT
eaccount.`".$field."`
FROM `eaccount` 
 WHERE
eaccount.id = '".$_SESSION['user_id']."';";

if($query_run=mysql_query($query))
{
if($query_result=mysql_result($query_run,0,$field))
{
return $query_result;
}
}
}//end of function


?>


<?php
function TypeGenerator($t)
{
global $isManage;
if($t==1)
{
//do smthin
$isManage=true;
return "Manager";
}
else
{
//do smthin
$isManage=false;
return "Customer";
}
}//end of function
?>
	</body>
</html>