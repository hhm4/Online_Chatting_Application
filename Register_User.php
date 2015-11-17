<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
$json_string = $_POST['userInfo'];
$userInfo = json_decode($json_string);
$username = $userInfo->username;
$password = $userInfo->Password;
$email1=$userInfo->Email;
echo $username;
echo $password;
echo $email1;
$sql=mysql_query('Insert into hhm4.USERS(UserName,EmailId,User_Password) values ("dddd","dddd","dddd");', $con);
?>