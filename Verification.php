<?php


$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
$VerificationCode=(int)$_POST['VerificationCode'];
$VerificationCode=12302;
echo $VerificationCode;
echo gettype($VerificationCode);
$email=$_POST['EmailId'];
$email="ysudhdj";
$registration=mysql_query("Select * From UNVERIFIED_USERS where TOKEN=12302 AND EmailId='".$email."' ",$con);
if (mysql_num_rows($registration)!=0){
	$row = mysql_fetch_array($registration, MYSQL_ASSOC);
	$name=$row['UserName'];
	$em=$row['User_Password'];
	$sql=mysql_query("Insert into USERS(UserName,EmailId,User_Password) values('$name','$email','$em')", $con);
	$delete=mysql_query("Delete FROM UNVERIFIED_USERS where EmailId='".$email."'",$con);
	$response=array("Result"=>1);
}
else{
	$response=array("Result"=>0);
}
$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;
mysql_close()
?>
