<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);

$dbcon=mysql_select_db($config['database'],$con);
$email=$_POST['EmailId'];
$password=$_POST['Password'];
$query="select * from USERS where EmailId='$email' AND User_Password='$password'";
$authentication=mysql_query($query,$con);
$count=mysql_num_rows($authentication);

if ($count>0){
	
   while($r = mysql_fetch_assoc($authentication))
  {
	 $userid=$r['UserId'];
   }
   
$query="Select * From CONTACTS where CONTACTS_FROMUSERID ='$userid'";
$newvalues=mysql_query($query,$con);
  while($r = mysql_fetch_assoc($newvalues))
  {
     $rows['contacts'][]=$r;
	 $response=$rows;
	 echo $response;
   }
	$response=array("Result"=>1,"UserId"=>$userid);
	
}
else{
	$response=array("Result"=>0);
}

$encoded = json_encode($response);
header('Content-type: application/json');
echo $encoded;
mysql_close();

?>
