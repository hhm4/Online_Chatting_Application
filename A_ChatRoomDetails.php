<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);

$ldate=$_POST['MaxDate'];
$query="Select max(UpdatedAt) From CHATROOM_USERS";
$max=mysql_query($query,$con);
$row = mysql_fetch_array($max, MYSQL_ASSOC);
$sdate=$row['max(UpdatedAt)'];
$ldate = date('Y-m-d H:i:s',strtotime($ldate));

if($sdate==$ldate)
{
 $response = array("Result"=>0);
	
}	

else
{
$query="Select * From CHATROOM_USERS where UpdatedAt > '$ldate'";
$newvalues=mysql_query($query,$con);
  while($r = mysql_fetch_assoc($newvalues))
  {
	 $chatroomid=$r['ChatRoomId'];
     $rows[]=array('data' => $r);
	 echo $rows;
   }
	
}
$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded; 
mysql_close();
?>

