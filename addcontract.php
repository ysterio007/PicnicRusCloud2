<html>
<head>

<title>new contract</title>
 <style type="text/css">
.FText:focus{
background:#dcfcc5;
}

</style>
</head>

<body>
<form method="post" action="addcontract.php" >
<p><label for='contractreference'>Please Enter new Contract Reference Identifier</label><input class="FText" type='text' name='contractreference' /></p>
<p><input type='submit' /></p>

<?php
include('init.php');
if(isset($_POST['contractreference'])&&!empty($_POST['contractreference'])){
$query ="INSERT into contract(contract.id) VALUES('".$_POST['contractreference']."');";

if($query_run=mysql_query($query))
{
 include('globalvar.php');

$_SESSION['tmp_cnt_id']=$_POST['contractreference'];
echo $_SESSION['tmp_cnt_id'];
$_SESSION['tmp_cnt_cn']="";
$_SESSION['tmp_cnt_cd']="";
ob_start();
header("Location: editcontract.php");
}
else
echo "You must specify a valid reference number";
}
?>
</form>
</body>
</html>