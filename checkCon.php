<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysqli_connect();
if(!$con)
{
	print "Not connected";
}
$dbCon=mysqli_select_db($config['database'], $con);
$upload_dir = '/afs/cad/u/h/h/hhm4/public_html/UPLOADS/';
$upload_dir_db = '/afs/cad/u/h/h/hhm4/public_html/UPLOADS/';
$istextmsg=$_POST[IsTextMessage];
$message=$_POST[Message];
$fromuserid=$_POST[FromUserId];
$chatroomid=$_POST[ChatRoomId];
$istextmsg = $istextmsg === 'true'? true: false;

   $query=mysqli_query("Insert into CHATMESSAGES(ChatRoomId,FromUserId,Message) values('{$chatroomid}','{$fromuserid}','{$message}')", $con);
   if(!$query)
   {

    $response = array("Result"=> 1); 	   }

   else
  {  $response = array("Result"=> 0);  }



$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;
mysql_close();
?>

