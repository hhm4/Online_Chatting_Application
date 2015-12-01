<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);

$groupchat=$_POST[IsGroupChat];
$userids=$_POST[UserIds];
$groupname=$_POST[GroupName];
$chatroomid=$_POST[ChatRoomId];
$isgroupchat = $groupchat === 'true'? true: false;

if($isgroupchat)
{
   
   $query="Select max(ChatRoomId) From CHATROOM_USERS";
   $max=mysql_query($query,$con);
   $row = mysql_fetch_array($max, MYSQL_ASSOC);
   $maxroomid=$row['max(ChatRoomId)'];
   $grpchatroomid=$maxroomid < 1000000 ? 1000000: $maxroomid+1;
   $query5="Insert into CHATROOM_USERS(ChatRoomId,UserIds,IsGroupChat,GroupName) values($grpchatroomid,'{$userids}',$isgroupchat,'{$groupname}')";
   $sql=mysql_query($query5, $con);
   echo $query5;
   if(mysql_affected_rows()==1)
   {
   $query="Select max(ChatRoomId) From CHATROOM_USERS";
   $max=mysql_query($query,$con);
   $row = mysql_fetch_array($max, MYSQL_ASSOC);
   $maxroomid=$row['max(ChatRoomId)'];
   $response =array("Result"=>0,"ChatRooomId"=>$maxroomid);
   }
   else
   {
	   $response ==array("Result"=>2);
	   
   }


}

else
{
	$sql=mysql_query("Insert into CHATROOM_USERS(ChatRoomId,UserIds,IsGroupChat) values('{$chatroomid}','{$userids}','{$isgroupchat}')", $con);
	if(mysql_affected_rows()==1)
   {
	$response =  array("Result"=>0);
   }
   
   else
   {
	   $response =  array("Result"=>2);
   }
	
}

$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;
mysql_close();
?>

