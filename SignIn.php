<?php


$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);

$dbcon=mysql_select_db($config['database'],$con);
$email=$_POST['EmailId'];
$password=$_POST['Password'];

$query = sprintf("SELECT EmailId,User_Password FROM USERS
    WHERE EmailId='%s' AND User_Password='%s'",
    mysql_real_escape_string($email),
    mysql_real_escape_string($password));
#$authentication=mysql_query($query,$con);
$query="select * from USERS where EmailId='$email' AND User_Password='$password'";
echo $query;
$authentication=mysql_query("select * from USERS where EmailId='$email' AND User_Password='$password'",$con);

$count=mysql_num_rows($authentication);
echo $count;
if ($count>0){
	$response=array("Result"=>1);
}
else{
	$response=array("Result"=>0);
}

$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;
mysql_close();

?>
