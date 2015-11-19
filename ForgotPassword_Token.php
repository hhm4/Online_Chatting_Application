<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
$email=$_POST['EmailId'];
echo $email;
$query="select * from USERS where EmailId='$email'";
echo $query;
$authentication=mysql_query($query,$con);
$count=mysql_num_rows($authentication);
echo $count;
if($count>0)
{
$id= rand(1000000,2000000);
$verification=mysql_query("Insert into Token_Verification(EmailId,Token) values ('{$email}',$id)", $con);

			mail($email, "Password Reset", "Password Reset Token :".$id);
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