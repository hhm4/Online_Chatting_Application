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
$email=mysql_real_escape_string($email);
$existingUser=mysql_query("select * from USERS where EmailId='sm2239w@njit.edu' ", $con);
$num=mysql_num_rows($existingUser);
echo "number of rows".$num;
if($num){
	#$id= mysql_query("SELECT FLOOR(RAND()*40000)+10000", $con);
	$id=65645;
echo $id;
$verification=mysql_query("Insert into UNVERIFIED_USERS (UserName,EmailId,User_Password,Token) values ('{$username}','{$email}','{$password}',$id)", $con);
	echo $verification;
	if($verification){
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
