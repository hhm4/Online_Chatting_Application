<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$mysqli=mysql_connect($config['host'],$config['username'],$config['password']);
$dbCon=mysql_select_db($config['database'], $con);
//$username = "sheik";
bool $ result = TRUE;
echo "1result:".$result;
//$mysqli = mysqli_connect();
echo "2result:".$result;
//$call = mysqli_prepare($mysqli, 'CALL Test_OutProcedure(?)');
echo "3result:".$result;
//mysqli_stmt_bind_param($call, 's', $username);
//mysqli_stmt_execute($call);
echo "4result:".$result;
//mysqli_stmt_bind_result($call, $result);
//mysqli_stmt_fetch($call);
echo "5result:".$result;
           
/>