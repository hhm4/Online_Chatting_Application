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
   if(mysql_affected_rows()==1)
   {

    $response = array("Result"=> 0); 	
	
	$update = mysql_query("select UserIds from CHATROOM_USERS where ChatRoomId='$chatroomid'",$con);
	$row = mysql_fetch_array($update, MYSQL_ASSOC);
    $userids=$row['UserIds'];
	echo $userids;
	$userids= explode(";",$userids);
    foreach ($userids as $p)
    {
	 
	 $chk= mysql_query("Select * from CONTACTS where Contacts_FromUserId='$fromuserid' AND Contacts_UserId='$p'",$con);
	 echo "Select * from CONTACTS where Contacts_FromUserId='$fromuserid' AND Contacts_UserId='$p'";
	 echo PHP_EOL;
	 $count=mysql_num_rows($chk);
	 echo $count;
	 if(!(count>=1) && $fromuserid!=$p)
	 {
		 $sql1=mysql_query("Select * from USERS where UserId='$p'",$con);
		 $row = mysql_fetch_array($sql1, MYSQL_ASSOC);
		 $email=$row['EmailId'];
		 echo $email;
		 $sql=mysql_query("Insert into CONTACTS(Contacts_UserId,Contacts_FromUserId,Contacts_UserName,Contacts_EmailId,Contacts_Status) values('{$p}','{$fromuserid}','{$email}','{$email}',1)", $con);
		 
	 }
	}
   }
   else
  {  $response = array("Result"=> 1);  }

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
			$response = 1;
		}
	}
	else
	{
		print_r($_FILES);
	}
	
}


function checknonexistinguser()
{
	$update = mysql_query("select UserIds from CHATROOM_USERS where ChatRoomId='$chatroomid'",$con);
	$row = mysql_fetch_array($update, MYSQL_ASSOC);
    $userids=$row['UserIds'];
	echo $userids;
	$userids= explode(";",$userids);
    foreach ($userids as $p)
    {
	 
	 $chk= mysql_query("Select * from CONTACTS where Contacts_FromUserId='$fromuserid' AND Contacts_UserId='$p'",$con);
	 $count=mysql_num_rows($chk);
	 echo $count;
	 if(count<=0)
	 {
		 $sql1=mysql_query("Select * from USERS where UserId='$p'",$con);
		 $row = mysql_fetch_array($sql1, MYSQL_ASSOC);
		 $email=$row['EmailId'];
		 echo $email;
		 $sql=mysql_query("Insert into CONTACTS(Contacts_UserId,Contacts_FromUserId,Contacts_UserName,Contacts_EmailId,Contacts_Status) values('{$p}','{$fromuserid}','{$email}','{$email}',1)", $con);
		 
	 }
	}




	
	
}

$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;
mysql_close();
?>

