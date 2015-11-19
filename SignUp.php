<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
$username=$_POST['UserName'];
$password=$_POST['Password'];
$email=$_POST['EmailId'];
$query = sprintf("SELECT count(*) from USERS where EmailId='%s'",,
    mysql_real_escape_string($email));

$existingUser=mysql_query($query, $con);
echo $existingUser;
if($existingUser>0)
{
	$id= rand(10000,20000);
#echo $id;
$verification=mysql_query("Insert into UNVERIFIED_USERS (UserName,EmailId,User_Password,Token) values ('{$username}','{$email}','{$password}',$id)", $con);
	#echo $verification;
	if($verification){
		mail($email, "Online Chat verification", "Verification Code :".$id);
		$response=array("Result"=>0);
	}
}
else{
	$response=array("Result"=>"1");
}
$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;

mysql_close();
#$sql=mysql_query("Insert into USERS(UserName,EmailId,User_Password) values('{$username}','{$email}','{$password}')", $con);

?>
