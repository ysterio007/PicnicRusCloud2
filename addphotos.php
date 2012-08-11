<table name="t1"  >
<tr>

<form name="f1"  method='post'>
<fieldset ><legend>Place Name</legend><input type='text' name='pname' value=<?php gv1(); ?> ></fieldset>
<fieldset ><legend>Description</legend><textarea name='pdesc' rows="4" cols="50" value=<?php gv2(); ?> ><?php gv2(); ?></textarea></fieldset>
<input type="hidden" name="is" value="99" />
<input type='submit' value='Save' />
</form>
</tr>
<tr><!--start row-->

<?php
 include('globalvar.php');


function gv1()
{
 include('globalvar.php');
if(isset($_POST['pname']) && !empty($_POST['pname']))
{
echo $_POST['pname'];
$_SESSION['pname']=$_POST['pname'];
}
else if(isset($_SESSION['pname'])){
echo $_SESSION['pname'];
}

}
function gv2()
{
 include('globalvar.php');
if(isset($_POST['pdesc']) && !empty($_POST['pdesc']))
{
echo $_POST['pdesc'];
$_SESSION['pdesc']=$_POST['pdesc'];
}
else if(isset($_SESSION['pdesc'])){
echo $_SESSION['pdesc'];
}
}



 if(isset($_POST['upload'])&&$_POST['upload']=="1")
{
include('globalvar.php');
$to="places/".$_FILES['file']['name'];
$_SESSION['to']=$to;

move_uploaded_file($_FILES['file']['tmp_name'],$to);

}


?>
<td><!--image -->
<img src="./images/upload.png" alt="picture" width='300' height='300' >
</td><!-- end image -->
<td><!--image -->
<img src=<?php  echo $rr= isset($_SESSION['to'])? $_SESSION['to'] : "./images/upload.png" ;?> alt="picture" width='300' height='300' >
</td><!-- end image -->
<td><!--image -->
<img src="./images/upload.png" alt="picture" width='300' height='300' >
</td><!-- end image -->
</tr>
<tfoot><a href="opennewuploader.php" target="_blank"><input type='button' value='upload photos' /></a></tfoot>
</table>

<?php
//}

if(isset($_POST['pname']) && !empty($_POST['pname'])&&isset($_POST['pdesc']) && !empty($_POST['pdesc']))
{


echo "Uploaded ";

$query ="INSERT INTO place(place.`name`,place.description,place.photo1) VALUES('".$_POST['pname']."','".$_POST['pdesc']."','".$_SESSION['to']."');";
include('init.php');
if($query_run=mysql_query($query))
{
header('Location: addpicnic.php');
}
}
?>