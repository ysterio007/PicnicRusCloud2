<html>
<head>
<title>Login</title>
  <style type="text/css">

#form .row {
	border-bottom:1px solid #EEE;
	display:block;
	line-height:38px;
	overflow:auto;
	padding:24px 0px;
	width:100%;
}


#form .row .label {
	font-size:16px;
	font-weight:bold;
	font-family:Arial, Helvetica, sans-serif;
	width:180px;
	text-align:right;
	float:left;
	padding-right:10px;
	margin-right:10px;
}


#form .row .input {
	float:left;
	margin-right:10px;
/*	width:auto;*/
	width:285px;
	
	
}


#form .row .input2 {
	float:left;
	margin-right:10px;
/*	width:auto;*/
	width:466px;
	
	
}

#form .row .context {
	color:#999;
	font-size:11px;
	font-style:italic;
	line-height:14px;
	font-family:Arial, Helvetica, sans-serif;
	width:200px;
	float:left;
	
}


.detail {
	width:260px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:20px;
	padding:7px 8px;
	margin:0;
	display:block;
	border-radius:5px 5px 5px 5px;
/*	border-top-right-radius:20px 10px;*/
	background:#E9E9E9;
	border:1px solid #CCC;	
}

.mess {
	width:450px;
	max-width:450px;
	height:280px;
	overflow:auto;
	font-family:Arial, Helvetica, sans-serif;
	font-size:20px;
	padding:7px 8px;
	line-height:1em;
	margin:0;
	display:block;
	border-radius:5px 5px 5px 5px;
	background:#E9E9E9;
	border:1px solid #CCC;	
}


.detail:focus {
	background-color:#FFF;
	border:1px solid #999;
	outline:none;	
}

.mess:focus {
	background-color:#FFF;
	border:1px solid #999;
	outline:none;	
}


#form #submit {
	font-family:Arial, Helvetica, sans-serif;
	margin-top:25px;
	margin-left:200px;
	color:000;
	font-size:16px;
	text-shadow:1px 1px 1px #999;
	padding:10px;
	/*border-bottom-right-radius:15px 7px;
	border-top-left-radius:15px 7px;*/
	
}



</style>
</head>
<body>
<?php
require('globalvar.php');
include('init.php');


if(isset($_POST['username'])&&isset($_POST['password'])){ // main check if statement 1

$username=$_POST['username'];
$password=$_POST['password'];

$password_hash=md5($password);

if(!empty($username)&&!empty($password))
{//nested check if statement 1

$query="SELECT
eaccount.id,
eaccount.isManager
FROM `eaccount`
WHERE
eaccount.username = '".$username."' AND
eaccount.password = '".$password."' " ;

//echo $query;
if($query_run=mysql_query($query))
{//nested nested check if statement 1-----------------------------
//echo $username." ".$password." ".$password_hash;
$query_num_rows=mysql_num_rows($query_run);

if($query_num_rows==0)
{
echo 'invalid pass and user name';
}
else if($query_num_rows==1)
{
//session_start(); 

$user_id=mysql_result($query_run,0,'id');
$user_type=mysql_result($query_run,0,'isManager');
//$user_id=mysql_result($query_run,1,'username');// show the id of the user
$_SESSION['user_id']=$user_id;
$_SESSION['user_type']=$user_type;
//$_SESSION['user_name']=$user_id;

if($user_type==1)
{
header ( "Location: mainpage2.php" );
}
else if(isset($_SESSION['referrer'])){

header ( "Location: " . $_SESSION['referrer']);//redirect the user
}
 else
header ( "Location: mainpage.php" );
}
}//end nested nested check if statement 1---------------------------

}// nested check if statement 2
else {echo "you must enter the username and password";}
}// end main check if statement 1

?>


<div style="display:block;margin:20px;">
<form action=<?php echo "mainpage.php?main=login";?> method="POST">

<div class="row">
	<div class="label">Username</div> <!-- end .label -->
    <div class="input">
    <input type="text"  class="detail" name="username" id="username" />
    </div><!-- end .input -->
  </div><!-- end .row -->
	
<div class="row">
	<div class="label">Password</div> <!-- end .label -->
    <div class="input">
    <input type="password" id="password"  class="detail" name="password" value="">
    </div><!-- end .input -->

    </div><!-- end .row -->
    <div class="row">
    <div class="submit">
    <input type="submit"  id="submit" value="login"  />
    </div><!-- end .submit -->
    </div><!-- end .row -->
</form>
</div>
</body>
</html>
