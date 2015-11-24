<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
$upload_dir = '/afs/cad/u/h/h/hhm4/public_html/UPLOADS/';
$upload_dir_db = '/afs/cad/u/h/h/hhm4/public_html/UPLOADS/';
$istextmsg=$_POST[IsTextMessage];
$message=$_POST[Message];
$fromuserid=$_POST[FromUserId];
$chatroomid=$_POST[ChatRoomId];
$istextmsg = $istextmsg === 'true'? true: false;

if($istextmsg)
{
   $query=mysql_query("Insert into CHATMESSAGES(ChatRoomId,FromUserId,Message) values('{$chatroomid}','{$fromuserid}','{$message}')", $con);
   $result=mysql_query($query,$con);
   $response = $result ? array("Result"=>2):array("Result"=>0);

}

else
{
	if(is_uploaded_file($_FILES['userfile']['tmp_name']))
	{
		$dest = $_FILES['userfile']['name'];
		echo $dest;
		echo $upload_dir/$dest;
		$store_dir = $upload_dir_db.$dest;
		echo "$store_dir";
		$moveBool = false;
		$moveBool = move_uploaded_file($_FILES['userfile']['tmp_name'], "$store_dir");
	
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

