<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
$email=$_POST['EmailId'];
$token=$_POST['Token'];
$token=(int)$token;
$newpassword =$_POST['NewPassword'];
$query="select * from Token_Verification where EmailId='$email' AND Token='$token'";
echo $query;
$authentication=mysql_query($query,$con);
$count=mysql_num_rows($authentication);
echo $count;
if($count>0)
{
$verification=mysql_query("Update USERS SET User_Password='$newpassword' where EmailId='$email'", $con);
$response=array("Result"=>0);
}
else
{
	
	$response=array("Result"=>1);
	
}
$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;

mysql_close();


?>