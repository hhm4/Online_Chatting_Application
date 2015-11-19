<?php


$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);

$dbcon=mysql_select_db($config['database'],$con);
$email=$_POST['EmailId'];
$password=$_POST['Passsword'];
$authentication=mysql_query("select * from USERS where EmailId='".$email."' AND User_Passsword='".$password."'",$con);
$count=mysql_num_rows($authentication);
echo $count;
mysql_close();

?>
