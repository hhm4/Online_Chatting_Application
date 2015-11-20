<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$mysqli=mysql_connect($config['host'],$config['username'],$config['password']);

$username = "sheik";
bool $ result = TRUE;

$mysqli = mysqli_connect();

$call = mysqli_prepare($mysqli, 'CALL Test_OutProcedure(?)');
mysqli_stmt_bind_param($call, 's', $username);
mysqli_stmt_execute($call);
mysqli_stmt_bind_result($call, $result);
mysqli_stmt_fetch($call);
echo $result;
           
/>