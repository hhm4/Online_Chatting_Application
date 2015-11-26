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
$check=mysql_query($query,$con);
$count=mysql_num_rows($check);
if($count!=0)
{
$row = mysql_fetch_array($check, MYSQL_ASSOC);
$emailid=$row['Contacts_EmailId'];
$removedata=mysql_query(" Update CONTACTS SET IsAContact=0 ,Contacts_UserName='$emailid' where ContactId='$contactid'",$con);
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
