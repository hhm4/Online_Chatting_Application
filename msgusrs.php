<?php

echo "hi";
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
$dbCon=mysql_select_db($config['database'], $con);

$ChatRoomId= intval($_POST['ChatRoomId']);
$Message= $_POST['Message'];
$FromUserId=intval($_POST['FromUserId']);
$MessageLink=$_POST['MessageLink'];

echo $ChatRoomId;
echo $Message;
echo $FromUserId;
echo $MessageLink;	

$verification=mysql_query("Insert into CHATROOM_USERS(ChatRoomId, FromUserId, Message, MessageLink) values($ChatRoomId, $FromUserId, '$Message', '$MessageLink')", $con);
echo $verification;
if($verification)
{
	echo "inserted";
}    
?>