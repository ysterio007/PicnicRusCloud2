<html>
<head>
<title>Register</title>

<SCRIPT TYPE="text/javascript" src="scripts/formval.js" ></script>


	<link href="css/tablereplacer.css" rel="stylesheet" type="text/css" />
</head>

<body>
<NOSCRIPT>

<P> Javascript is not currently enabled on your browser. If you can enable it, your input will be checked as you enter it (on most browsers, at least). You may find this helpful. </P>

</NOSCRIPT>

<div id="formWrap">
<div id=articles>	
		<div id=contact_info>
<div id=contact_title>Registration form</div><!-- contact_title -->
<div id=contact_text>
<?php
if(!function_exists('checklogin')){
require('checklogin.php');
}
require('globalvar.php');
$m1=new md();
if(checklogin()){
echo "You are already registered and logged in <a href='logout.php'>logout</a>";


?>

<?php
}else if(!checklogin()){
//echo "<a href='register.php'>Register</a>";

$name="";
$email="";
$userid="";
$address="";

$dateofbirth="";
$phone="";
$fax="";
if(
isset($_POST['name'])&&
isset($_POST['email']))

{

$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['address'];
$yt1=$_POST['yt1'];
$mt1=$_POST['mt1'];
$dt1 =$_POST['dt1'];

$st1=$yt1.$mt1.$dt1;
$date1=date('Y-m-j',strtotime($st1));
$dateofbirth=$date1;
$phone=$_POST['phone'];
$fax=$_POST['fax'];


if(
!empty($name)&&!empty($email))
{

MOVESTEP2($name,$address,$dateofbirth,$email,$phone,$fax);

}
else echo "<div style='color:red;'>NAME AND EMAIL ARE REQUIRED</div>";
}

?>


<SCRIPT TYPE="text/javascript">

// Only script specific to this form goes here.

// General-purpose routines are in a separate file.
<!--

//-->
</SCRIPT>

<div id="form">

<form id="comments_form" onsubmit="return validateOnSubmit2(this)" action="mainpage.php?main=register" method="post">

<!--1-->
	<div class="row">
	<div id="inf_name" class="label">Name :</div> <!-- end .label -->
    <div class="input">
    <input class="detail" type="text" name="name" id="name" value="<?php echo $name ;?>" ONCHANGE="validateName(this, 'inf_name', true);" />
    </div><!-- end .input -->
    <div  class="context">*</div><!-- end .context -->
    </div><!-- end .row -->

	<!--2-->
	<div class="row">
	<div id="inf_address" class="label">Address :</div> <!-- end .label -->
    <div class="input">
    <input class="detail" type="text" name="address"  id="address" ONCHANGE="validateAddress(this, 'inf_address', true);" />
    </div><!-- end .input --> 
    <div  class="context">*</div><!-- end .context -->
    </div><!-- end .row -->
	
	<!--3-->
	<div class="row">
	<div class="label" id="inf_db">Date Of Birth :</div> <!-- end .label -->
    <div class="input">
	<table>
    <?php $m1->getmydate("1"); ?>
	</table>
    </div><!-- end .input -->
    <div  class="context">*</div><!-- end .context -->
    </div><!-- end .row -->
	
	<!--5-->
	<div class="row">
	<div id="inf_email" class="label">Email :</div> <!-- end .label -->
    <div class="input">
    <input class="detail" type="text" id="email" name="email" value="<?php echo $email ; ?>" ONCHANGE="validateEmail(this, 'inf_email', true);"  />
    </div><!-- end .input -->
    <div  class="context">*</div><!-- end .context -->
    </div><!-- end .row -->
	
	<!--6-->
	<div class="row">
	<div id="inf_phone" class="label">Phone :</div> <!-- end .label -->
    <div class="input">
    <input class="detail" type="text" name="phone" id="phone" ONCHANGE="validateTeleFax(this, 'inf_phone', true);" />
    </div><!-- end .input -->
    <div   class="context">*</div><!-- end .context -->
    </div><!-- end .row -->

	<!--7-->
	<div class="row">
	<div id="inf_fax" class="label">Fax :</div> <!-- end .label -->
    <div class="input">
    <input class="detail" type="text" name="fax" id="fax" ONCHANGE="validateTeleFax(this, 'inf_fax', true);"  />
    </div><!-- end .input -->
    <div  class="context">*</div><!-- end .context -->
    </div><!-- end .row -->

    <div class="submit" style="margin:0;">
    <input type="submit"  id="submit" name="submit" value="Register">
    </div><!-- end .submit -->
    </form>
    


</form>

</div>
</div>
</div>
<?php
}

function MOVESTEP2($name,$address,$dateofbirth,$email,$phone,$fax)
{

$_SESSION['tmp_name']=$name ;
$_SESSION['tmp_address']=$address ;
$_SESSION['tmp_dateofbirth']=$dateofbirth ;
$_SESSION['tmp_email']=$email ;
$_SESSION['tmp_phone']=$phone ;
$_SESSION['tmp_fax']=$fax ;
ob_start();
header('Location:mainpage.php?main=registerstep2');

}




?>
<?php
/*
//$num = cal_days_in_month(CAL_GREGORIAN, 8, 2003); // 31


$m1=new md();

$a=$m1->getmydate("1");
for($i=0;$i<count($a);$i++)
{
echo "<br />".$a[$i]."<br />";
}


//$m1->getmydate("2");
*/

class md
{
public $y=2000;
public $m=1;
public $d=1;
public function getmydate($e)
{

?>
<?php //echo "<form method='post' action='".$_SERVER['PHP_SELF']."' >"; ?>
<tr>
<td>
<input  class="DateClass2" type="text" value=1  size="2" maxlength="2" name="dt1" id="dt1" ONCHANGE="validateDB(dt1, 'inf_db', true,mt1.value,yt1.value);" />
</td>
<td>
<select ONCHANGE="validateDB(dt1, 'inf_db', true,mt1.value,yt1.value);" class="DateClass" name="<?php echo "mt".$e;?>" >
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
</td>
<td>
<select ONCHANGE="validateDB(dt1, 'inf_db', true,mt1.value,yt1.value);" class="DateClass" name="<?php echo "yt".$e;?>" >
<?php
for($i=date('Y');$i>date('Y')-100;$i--)
echo "<option value=".$i." >".$i."</option>";
?>
</select>
</td>
</tr>
<?php

//echo "<input type='submit' />
//</form>";

/*

$arr=array();
if(isset($_POST["daytxt".$e])){

$this->y=$_POST["yeartxt".$e];
$this->m=$_POST["monthtxt".$e];
$this->d=$_POST["daytxt".$e];

$arr[0]=$this->y;
$arr[1]=$this->m;
$arr[2]=$this->d;


}

return $arr;*/

}
}//end class
?>

</body>
</html>