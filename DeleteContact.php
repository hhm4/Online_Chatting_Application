<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);

$contactid=$_POST['ContactId'];
$query="Select * From CONTACTS where ContactId='$contactid'";
echo $query;
$check=mysql_query($query,$con);
$count=mysql_num_rows($check);
echo $count;
if($count!=0)
{

$removedata=mysql_query("Delete FROM CONTACTS where ContactId='$contactid'",$con);
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
