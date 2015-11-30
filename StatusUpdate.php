<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);

$userid=$_POST['UserId'];
$status=$_POST['StatusUpdate'];
$query="Update USERS set StatusUpdate='$status' where UserId='$userid'";
$check=mysql_query($query,$con);
if(mysql_affected_rows)
{
	
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
