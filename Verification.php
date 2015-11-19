<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
$token=$_POST['Token'];
$email=$_POST['EmailId'];
$query="Select * From UNVERIFIED_USERS where Token='$token' AND EmailId='email'";
echo $query;
# $query = sprintf("Select * From UNVERIFIED_USERS where Token=18714 AND EmailId='%s'",
// # mysql_real_escape_string($email));
// $query = sprintf("Select * From UNVERIFIED_USERS where Token='%d'",18714);
// $registration=mysql_query($query,$con);
// #$registration=mysql_query("Select count(*) From UNVERIFIED_USERS where TOKEN=' ". $vc. " ' AND (EmailId=' ".$email. " ')",$con);
// #$registration=mysql_query("CALL FetchUnverifiedUsers('$email','$vc')",$con);
// echo '     ';
// echo mysql_num_rows($registration);
// if (mysql_num_rows($registration)){
	// $row = mysql_fetch_array($registration, MYSQL_ASSOC);
	// $name=$row['UserName'];
	// $em=$row['User_Password'];
	// $sql=mysql_query("Insert into USERS(UserName,EmailId,User_Password) values('{$name}','{$email}','{$em}')", $con);
	// $delete=mysql_query("Delete FROM UNVERIFIED_USERS where EmailId='".$email."'",$con);
	// $response=array("Result"=>1);
// }
// else{
	// $response=array("Result"=>0,"Type"=>gettype($vc));
// }
// $encoded = json_encode($response);
// header('Content-type: application/json');
// echo $encoded;
mysql_close();
?>
