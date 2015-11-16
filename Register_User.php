<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
$dbCon=mysql_select_db($config['database'], $con);
sign_up();


function sign_up()
{
	global $connect;
	//$json_string = $_POST['userInfo'];
	//$userInfo = json_decode($json_string);
	$emailID = 'hi';
	$username = 'hello';
	$password = 'qwerty';
	$result= mysql_query('CALL Register_NewUser($username,$emailID,$password)',$con);
	
	if($result>0)
		
		echo "Success";
	}
	else
	{
		"registered";
	}
	mysqli_close($connect);
	print_r('Success');
}


?>