<?php
if(!function_exists('checklogin')){
function checklogin(){
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])){
return true;
}
else
return false;
}
}

?>