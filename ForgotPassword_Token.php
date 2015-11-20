<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
$email=$_POST['EmailId'];
$query="select * from USERS where EmailId='$email'";
$authentication=mysql_query($query,$con);
$count=mysql_num_rows($authentication);
if($count>0)
{
$query1="select * from Token_Verification where EmailId='$email'";
$emailauthentication=mysql_query($query1,$con);
$count1=mysql_num_rows($emailauthentication);
$id= rand(1000000,2000000);
if($count1>0)
{
	$verification=mysql_query("Update Token_Verification SET Token='$id' where EmailId='$email'", $con);
	$message = "
<html><head><title></title></head><body><p> Password Reset Token Resent</p><table><tr><th>Reset your Password by entering the new verification code manually in the application</th><th>";
$message.=$id;
$message.="</th></tr><tr></tr></table></body></html>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <Online chat Team>' . "\r\n";
			mail($email, "Password Reset", $message,$headers);
			$response=array("Result"=>0);
}
else
{
   $verification=mysql_query("Insert into Token_Verification(EmailId,Token) values ('{$email}',$id)", $con);
   $message = "
<html><head><title></title></head><body><p> Password Reset Token</p><table><tr><th>Reset your Password by entering the below verification code manually in the application</th><th>";
$message.=$id;
$message.="</th></tr><tr></tr></table></body></html>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <Online chat Team>' . "\r\n";
			mail($email, "Password Reset", $message,$headers);
			$response=array("Result"=>0);
}
 
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