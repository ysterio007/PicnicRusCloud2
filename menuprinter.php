<?php
$v=$_GET['v'];

if($v==1)
{
echo "  
      <ul id='u1'>
 <li><a href='mainpage.php?main=login'>Login</a></li>
 <li><a href='mainpage.php?main=register'>Register</a></li>
 <li><a href='mainpage.php?main=forgetpassword'>Forget Passwrod</a></li>
  </ul>
";

}
else if($v==2)
{
echo "
      <ul id='u2'>
 <li><a href='mainpage.php?main=search'>Search</a></li>
 <li><a href='mainpage.php?main=view'>View</a></li>
 <li><a href='mainpage.php?main=viewreserved'>View Reserved</a></li>
  </ul>
";

}

?>