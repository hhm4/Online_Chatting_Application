<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
$username=$_POST['UserName'];
$password=$_POST['Password'];
$email=$_POST['EmailId'];
$query="select * from USERS where EmailId='$email'";
$authentication=mysql_query($query,$con);
if(mysql_num_rows($authentication)>0)
{
	$id= rand(10000,20000);
	$verify=mysql_query("select * from UNVERIFIED_USERS where EmailId='$email'",$con)
	if(mysql_num_rows($verify)>0)
	{
		$verification=mysql_query("Update UNVERIFIED_USERS set Token ='$id' where EmailId='$email'");
	}
    else
	{
	$verification=mysql_query("Insert into UNVERIFIED_USERS (UserName,EmailId,User_Password,Token) values ('{$username}','{$email}','{$password}',$id)", $con);
	}
	
            $message = "
<html><head><title></title></head><body><p> Sign Up Mail</p><table><tr><th>Please enter the  verification code manually in the application</th><th>";
$message.=$id;
$message.="</th></tr><tr></tr></table></body></html>";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: <Online chat Team>' . "\r\n";
			mail($email, "Password Reset", $message,$headers);
			$response=array("Result"=>0);	
	}
}
else{
	$response=array("Result"=>"1");
}
$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;
mysql_close();

?>
