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
$FromId=$_POST['FromUserId'];
$query="Select * From USERS where EmailId='$email'";
$registration=mysql_query($query,$con);
$count=mysql_num_rows($registration);
if($count!=0)
{
$row = mysql_fetch_array($registration, MYSQL_ASSOC);
$userid=$row['UserId'];
$userstatus=$row['UserStatus'];
$contactsquery="Select * From CONTACTS where Contacts_UserId='$userid'";
$contactscheck=mysql_query($contactsquery,$con);
$contactscount=mysql_num_rows($contactscheck);
  if($contactscount==0)
   {
	$sql=mysql_query("Insert into CONTACTS(Contacts_UserId,Contacts_FromUserId,Contacts_UserName,Contact_Status) values('{$userid}','{$FromId}',{$ContactsName}','{$userstatus}')", $con);
	$response=array("Result"=>0);
   }
   
   else
   {
	$response=array("Result"=>1);
   }
	
}

else
 {
	 $message = "
<html><head><title>HTML email</title></head><body><p> Join our Exciting online Chat Application</p><table><tr><th>Please click the below link to join our exciting Chat application</th><th>www.onlinechat.com</th></tr><tr></tr>
</table></body></html>
";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <Online chat Team>' . "\r\n";


	 mail($email, "Join Online Chat",$message,$headers);
	 $response=array("Result"=>2);
	 
 }
$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;
mysql_close();
?>
