<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$mysqli=mysql_connect($config['host'],$config['username'],$config['password']);
$dbCon=mysql_select_db($config['database'], $con);
echo "hi";
           
/>