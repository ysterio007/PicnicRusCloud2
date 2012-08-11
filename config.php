<?php

$config['db_host']='localhost';
$config['db_user']='root';
$config['db_pass']='';
$config['db_name']='ahmadhammad1081443';//AhmadHammad1081443

foreach($config as $k => $v){
              global define(strtoupper($k),$v);
                                                     }
													 
?>													