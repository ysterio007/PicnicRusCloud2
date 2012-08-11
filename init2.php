<?php

$config['db_host']='localhost';
$config['db_user']='root';
$config['db_pass']='';
$config['db_name']='ahmadhammad1081443';//AhmadHammad1081443

foreach($config as $k => $v){ define(strtoupper($k),$v);} 
             
                                                    


if (!mysql_connect(DB_HOST,DB_USER,DB_PASS)||!mysql_select_db(DB_NAME)) {
    die('Could not connect: ' . mysql_error());
}


?>
