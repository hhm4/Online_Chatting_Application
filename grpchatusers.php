<?php

echo "hi";
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
$dbCon=mysql_select_db($config['database'], $con);

$GroupImage= "someImagedir";
$GroupName= "CoolGuysdude";
$IsGroupChat=1;
$UserIds=';1;2;3;4;5;';

echo $GroupImage;
echo $GroupName;
echo $IsGroupChat;
echo $UserIds;

$verification=mysql_query("Insert into CHATROOM_USERS(UserIds, IsGroupChat, GroupName, GroupImage) values('$UserIds', $IsGroupChat, '$GroupName', '$GroupImage')", $con);
//$query = "Insert into CHATROOM_USERS(UserIds, IsGroupChat, GroupName, GroupImage) values('$UserIds', $IsGroupChat, '$GroupName', '$GroupImage');";  
echo $verification;
if($verification)
{
	echo "inserted";
}    
?>