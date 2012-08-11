<?php

require('globalvar.php');
session_destroy();
header('Location: mainpage.php');
echo "you logged out";
//ob_end_flush(); to print the html from the buffer if the redirecting did not succeed
?>