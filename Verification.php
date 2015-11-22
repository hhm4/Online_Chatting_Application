<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
$token=$_POST['VerificationCode'];
$token=(int)$token;
$email=$_POST['EmailId'];
$query="Select * From UNVERIFIED_USERS where Token=$token AND EmailId='$email'";

 $registration=mysql_query($query,$con);

 $count=mysql_num_rows($registration);
 
 if ($count==0){
	 $response=array("Result"=>0);
 }
 else{
	 
	$row = mysql_fetch_array($registration, MYSQL_ASSOC);
	 $name=$row['UserName'];
	 $pass=$row['User_Password'];
	 #$sql=mysql_query("Insert into USERS(UserName,EmailId,User_Password) values('{$name}','{$email}','{$pass}')", $con);
	 #$delete=mysql_query("Delete FROM UNVERIFIED_USERS where EmailId='$email'",$con);
	/*  if($sql)
	 { */
	 $maxid=mysql_query("Select max(UserId) from USERS", $con);
	 echo $maxid;
	 $row = mysql_fetch_array($maxid, MYSQL_ASSOC);
	 $max=$row['max(UserId)'];
	 $userinfo= mysql_query("Select * from USERS  where UserId='$max'", $con);
	 while($r = mysql_fetch_assoc($userinfo))
  {
     $rows['UserInfo'][]=$r;
	 $response=$rows;
   }
	 // }
	 
 }

 $encoded = json_encode($response);
 header('Content-type: application/json');
 echo $encoded;
 mysql_close();
?>
