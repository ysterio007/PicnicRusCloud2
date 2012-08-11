<?php
if(isset($_POST['upload'])&&$_POST['upload']=="1")
{
$to="images/".$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],$to);
echo "Uploaded";
}

?>
<form method="POST" enctype="multipart/form-data">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="tmp_name" value="v.doc">
<input type="file" name="file">
<input type="submit" value="upload">
</form>