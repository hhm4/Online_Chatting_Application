<?php

echo "hi";
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
$dbCon=mysql_select_db($config['database'], $con);

$GroupImage= $_POST['dir'];
$GroupName= $_POST['grp_name'];
$IsGroupChat=intval($_POST['is_grp_chat']);
$UserIds=$_POST['grp_members'];

echo $GroupImage;
echo $GroupName;
echo $IsGroupChat;
echo $UserIds;

$verification=mysql_query("Insert into CHATROOM_USERS(UserIds, IsGroupChat, GroupName, GroupImage) values('$UserIds', $IsGroupChat, '$GroupName', '$GroupImage')", $con);
echo $verification;
if($verification)
{
	echo "inserted";
}    
?>