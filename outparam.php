<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$mysqli=mysql_connect($config['host'],$config['username'],$config['password']);
$dbCon=mysql_select_db($config['database'], $con);
$username = "sheik";

$mysqli = mysqli_connect();

$call = mysqli_prepare($mysqli, 'CALL Test_OutProcedure(?, @result)');
mysqli_stmt_bind_param($call, 's', $username);
mysqli_stmt_execute($call);
mysqli_stmt_bind_result($call, $result);
mysqli_stmt_fetch($call);
echo $result;
           
?>