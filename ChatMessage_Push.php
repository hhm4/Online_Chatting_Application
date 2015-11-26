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
   if($query)
   {

    $response = array("Result"=> 0); 	   }

   else
  {  $response = array("Result"=> 2);  }

}
else
{
	if(is_uploaded_file($_FILES['userfile']['tmp_name']))
	{
		$dest = $_FILES['userfile']['name'];
		$store_dir = $upload_dir_db.$dest;
		$moveBool = false;
		$moveBool = move_uploaded_file($_FILES['userfile']['tmp_name'], "$store_dir");
		if($moveBool==1)
		{
			 $response = array("Result"=>0);
		}
		else
		{
			$response = 2;
		}
	}
	else
	{
		print_r($_FILES);
	}
	
}

$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;
mysql_close();
?>

