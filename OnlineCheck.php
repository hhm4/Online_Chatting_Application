<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);

$userid=$_POST['UserId'];
$query="Update CONTACTS Set Contacts_Status=0 where Contacts_UserId='$userid'";
$check=mysql_query($query,$con);
$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;
mysql_close();
?>
