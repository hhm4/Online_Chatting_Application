<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);

$email=$_POST['EmailId'];
$ContactsName=$_POST['ContactName'];

$query="Select * From USERS where EmailId='$email'";
 $registration=mysql_query($query,$con);

 $count=mysql_num_rows($registration);
 if ($count==0)
 {
	 mail($email, "Join Online Chat", "Join online Chat www.onlineChat.com");
	 $response=array("Result"=>0);
	 
 }
 
 else
 {
	 $row = mysql_fetch_array($registration, MYSQL_ASSOC);
	 $userid=$row['UserId'];
	 $userstatus=$row['UserStatus'];
	 $sql=mysql_query("Insert into CONTACTS(Contacts_UserId,Contact_UserName,Contact_Status) values('{$userid}','{$ContactsName}','{$userstatus}')", $con);
	 $response=array("Result"=>1);
	 
 }
	 
 $encoded = json_encode($response);
 header('Content-type: application/json');
 echo $encoded;
mysql_close();
?>
