<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
$upload_dir = '/afs/cad/u/h/h/hhm4/public_html/UPLOADS/';
$upload_dir_db = 'C:\\\Users\\\Kumi\\\Desktop\\\phpUpload';
$istextmsg=$_POST[IsTextMessage];
$message=$_POST[Message];
$fromuserid=$_POST[FromUserId];
$chatroomid=$_POST[ChatRoomId];
$istextmsg = $istextmsg === 'true'? true: false;

if($istextmsg)
{
   $a=" Insert into CHATMESSAGES(ChatRoomId,FromUserId,Message) values('{$chatroomid}','{$fromuserid}','{$message}')";
   echo $a;
   $query=mysql_query("Insert into CHATMESSAGES(ChatRoomId,FromUserId,Message) values('{$chatroomid}','{$fromuserid}','{$message}')", $con);
   $result=mysql_query($query,$con);
   $response = $result ? array("Result"=>0):array("Result"=>2);

}

else
{
	if(is_uploaded_file($_FILES['userfile']['tmp_name']))
	{
		echo "hello2";
		$dest = $_FILES['userfile']['name'];
		print_r($_FILES);
		echo $dest;
		echo $upload_dir/$dest;
		$dest_db = "\\\\".$dest;
		$store_dir = $upload_dir_db.$dest_db;
		echo "$store_dir";
		$moveBool = false;
		$moveBool = move_uploaded_file($_FILES['userfile']

['tmp_name'], "$upload_dir/$dest");
	
		if($moveBool)
		{
			 $response = array("Result"=>0);
		}
	
	}
	else
	{
		echo "Possible file upload attack: ";
		echo "filename '".$_FILES['userfile']['tmp_name'] ."'.";
		print_r($_FILES);
	}
	
}

$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;
mysql_close();
?>

