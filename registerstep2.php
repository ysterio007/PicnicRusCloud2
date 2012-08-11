<html>
<head>
<title>Register</title>
<script type="text/javascript" src="scripts/ahmadscripts.js" ></script>
<SCRIPT TYPE="text/javascript" src="scripts/formval.js" ></script>
	<link href="css/tablereplacer.css" rel="stylesheet" type="text/css" />
 <style type="text/css">

    </style>


</head>

<body>

<NOSCRIPT>

<P> Javascript is not currently enabled on your browser. If you can enable it, your input will be checked as you enter it (on most browsers, at least). You may find this helpful. </P>

</NOSCRIPT>

<div id="formWrap">
<div id=articles>	
		<div id=contact_info>
<div id=contact_title>E-Account Form</div><!-- contact_title -->
<div id=contact_text>
<?php
require('checklogin.php');
require('globalvar.php');

if(checklogin()){
echo "You are already registered and logged in <a href='logout.php'>logout</a>";


?>

<?php
}else if(!checklogin()){
//echo "<a href='register.php'>Register</a>";
$username="";
$password="";
$password_again="";
$name =$_SESSION['tmp_name'];
$address=$_SESSION['tmp_address'];

$dateofbirth=$_SESSION['tmp_dateofbirth'];
$email=$_SESSION['tmp_email'];
$phone=$_SESSION['tmp_phone'];
$fax=$_SESSION['tmp_fax'];
$_SESSION['email']=$_SESSION['tmp_email'];
if(isset($_POST['username'])&&
isset($_POST['password'])&&
isset($_POST['password_again']))

{
$username=$_POST['username'];
$password=$_POST['password'];
//$userid=$_POST['id'];
$password_again=$_POST['password_again'];


if(!empty($username)&&!empty($password)&&
!empty($password_again))
{
if($password!=$password_again)
{
echo "Password do not match !";
}
else{
checkUserName($username,$password,$name,$address,$dateofbirth,$email,$phone,$fax);
}
}
else echo "All field are required";
}

?>
<div id="form">
<form id="comments_form" onsubmit="return validateOnSubmitR2(this)" action="mainpage.php?main=registerstep2" method="post">
	<!--1-->
	<div class="row">
	<div id="inf_username2" class="label">Username :</div> <!-- end .label -->
    <div class="input">
    <input class="detail" type="text" id="username" name="username" maxlength="13" value="<?php echo $username ; ?>" onKeyUp="validateUserName(this.value);"    onBlur="validateUserName(this.value);" maxlength="13" ONCHANGE="validateUserNameSC2(this, 'inf_username', true);"/>    
   </div><!-- end .input -->
    <div  class="context"> <img src="images/fbig.png" id="status" style="margin-left:5px; vertical-align:middle; "  /></div><!-- end .context -->
    </div><!-- end .row -->

		<!--2-->
	<div class="row">
	<div id="inf_password" class="label">Password :</div> <!-- end .label -->
    <div class="input">
    <input class="detail"  type="password" name="password" id="password" onKeyUp="validatePassword(this.value);"    onBlur="validatePassword(this.value);" maxlength="12" ONCHANGE="validatePasswordSC2(this, 'inf_password', true);" />   
   </div><!-- end .input -->
    <div  class="context"> <img src="images/fbig.png" id="status2" style="margin-left:5px; vertical-align:middle; "  /></div><!-- end .context -->
    </div><!-- end .row -->
	
		<!--3-->
	<div class="row">
	<div id="inf_password_again" class="label">Password Again :</div> <!-- end .label -->
    <div class="input">
    <input class="detail" type="password" id="password_again" name="password_again" onKeyUp="validatePassword2(this.value,password.value);"    onBlur="validatePassword2(this.value);" maxlength="12"  />    
   </div><!-- end .input -->
    <div  class="context"> <img src="images/fbig.png" id="status2b" style="margin-left:5px; vertical-align:middle; "  /></div><!-- end .context -->
    </div><!-- end .row -->

    <div class="submit" style="margin:0;">
    <input type="submit"  id="submit" name="submit" value="Register">
    </div><!-- end .submit -->
    </form>


</div>
</div>
</div>

<?php
}

function checkUserName($un,$password,$name,$address,$dateofbirth,$email,$phone,$fax){
require('init.php');

$query="
SELECT
eaccount.username , eaccount.id
FROM `eaccount`
WHERE  
eaccount.username = '".$un."' ;";
//echo $query.")";
$query_run=mysql_query($query);

if(mysql_num_rows($query_run)==1)
{
echo "The user name ".$un." is already exists";
}
else
{

insertdata($un,$password,$name,$address,$dateofbirth,$email,$phone,$fax);//md5(pass
//echo "OK";
}
}

function insertdata($v1,$v2,$v3,$v4,$v5,$v6,$v7,$v8)
{
$query="
INSERT INTO eaccount(eaccount.username,eaccount.password,
eaccount.`Name`,eaccount.address,eaccount.dateofbirth,
eaccount.email,eaccount.phone,eaccount.fax) 
VALUES('".mysql_real_escape_string($v1)
."','".mysql_real_escape_string($v2).
"','".mysql_real_escape_string($v3).
"','".mysql_real_escape_string($v4).
"','".mysql_real_escape_string($v5).
"','".mysql_real_escape_string($v6).
"','".mysql_real_escape_string($v7).
"','".mysql_real_escape_string($v8)."' );";
//echo $query;
if($query_run=mysql_query($query)){
setuseridintosession($v1);
setuseremailintosession($v2);
$_SESSION['tmp_un']=$v1;
$_SESSION['tmp_up']=$v2;
ob_start();
header('Location:register_success.php?un='.$v1."&up=".$v2."&name=".$v3);
echo "Registration Succeed";
}
else
{
echo "sorry we could not register you at this time , try again later";
}

}
function setuseridintosession($v1)
{
require('init.php');
include('globalvar.php');
$query="
SELECT
eaccount.id
FROM `eaccount`
WHERE  
eaccount.username = '".$v1."' ;";

$query_run=mysql_query($query);



$user_id=mysql_result($query_run,0,'id');
$_SESSION['userid']=$user_id;
}
function setuseremailintosession($v1)
{
require('init.php');
include('globalvar.php');
$query="
SELECT
eaccount.email
FROM `eaccount`
WHERE  
eaccount.username = '".$v1."' ;";

$query_run=mysql_query($query);



$user_email=mysql_result($query_run,0,'email');
$_SESSION['email']=$user_email;
}
?>

</body>
</html>
