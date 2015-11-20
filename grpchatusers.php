<?php

echo "hi";
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$mysqli=mysql_connect($config['host'],$config['username'],$config['password']);
$dbCon=mysql_select_db($config['database'], $con);

$GroupImage= "someImagedir";
$GroupName= "CoolGuys";
$IsGroupChat=1;
$UserIds=';1;2;3;4;';

echo $GroupImage;
echo $GroupName;
echo $IsGroupChat;
echo $UserIds;


$query = "Insert into CHATROOM_USERS(UserIds, IsGroupChat, GroupName, GroupImage) values('$UserIds', $IsGroupChat, '$GroupName', '$GroupImage');";  
echo $mysql_affected_rows;
if(mysql_affected_rows>0)
{
	echo "inserted";
}    
?>