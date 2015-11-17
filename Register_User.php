<?php
<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
$json_string = $_POST['userInfo'];
	echo $json_string;
	$userInfo = json_decode($json_string);
	$emailID = $userInfo->emailID;
	$username = $userInfo->username;
	$password = $userInfo->Password;
	echo "\n"."emailID:". $emailID ."\n". "username:". $username ."\n". "password:" . $password ;

	$query = " Insert into USERS(UserName, EmailId, User_Password) values('$username', '$emailID', '$password')";
	
	
	$count=mysql_query($connect,$query) or die(mysql_error($connect)) or die(mysql_error());
	
	if($count>0)
		
		echo "Success";
	}
	else
	{
		"registered";
	}


?>