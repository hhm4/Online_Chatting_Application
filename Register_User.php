<?php
<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
/* $json_string = $_POST['userInfo'];
	echo $json_string;
	$userInfo = json_decode($json_string); */
	$emailID = 'shoot the kuruvi';
	$username = 'shoot the kuruviname';
	$password = '123';
	$count=mysql_query(" Insert into hhm4.USERS(UserName, EmailId, User_Password) values('$username', '$emailID', '$password')",$con);
	
	if($count>0)
		
		echo "Success";
	}
	else
	{
		"registered";
	}


?>