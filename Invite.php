<?php

$email=$_POST['EmailId'];

$message = "
<html><head><title>Invite to our Chat Application</title></head><body><p> Link will be coming soon </p><table><tr><th></th><th></th></tr><tr></tr>
</table></body></html>
";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <Online chat Team>' . "\r\n";
$check= mail($email, "Join Online Chat",$message,$headers);
echo $check;
if($check)
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
