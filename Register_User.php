<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysqli_connect($config['host'],$config['username'],$config['password'],$config['database');
$usernam= 'rrr';
$email='gggg';
$pwd='123';
$stmt =mysqli_prepare($con,"CALL Testing()");
mysqli_stmt_execute($stmt);




?>