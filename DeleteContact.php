<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);

$contactid=$_POST['ContactId'];
$fromid=$_POST['FromId'];
$query="Select * From CONTACTS where ContactId='$contactid'";
$check=mysql_query($query,$con);
$count=mysql_num_rows($check);
if($count!=0)
{
$row = mysql_fetch_array($check, MYSQL_ASSOC);
$userid=$row['Contacts_UserId'];
$UserIds1=';'.$fromid.';'.$userid.';';
$UserIds2= ';'.$userid.';'.$fromid.';';
$contactquery="Select ChatRoomId From CHATROOM_USERS where UserIds ='$UserIds1' or UserIds ='$UserIds2' ";
if(mysql_num_rows($contactquery)>0)
{
	
$deletechatmsg=mysql_query("Delete FROM CHATMESSAGES where ChatRoomId='$contactquery'",$con);
$deletechatroom=mysql_query("Delete FROM CHATROOM_USERS where ChatRoomId='$contactquery'",$con);
if(mysql_affected_rows($deletechatmsg)>0 && mysql_affected_rows($deletechatroom)>0)
{
$removedata=mysql_query("Delete FROM CONTACTS where ContactId='$contactid'",$con);

}
$response=array("Result"=>0);	
	
}


}

else
 {
	 $response=array("Result"=>2);
	 
 }
$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;
mysql_close();
?>
