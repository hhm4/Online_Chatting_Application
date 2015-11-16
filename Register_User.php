<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	
	require 'checkCon.php';
	sign_up();
}

function sign_up()
{
	global $connect;
	$json_string = $_POST['userInfo'];
	$userInfo = json_decode($json_string);
	$emailID = $userInfo->emailID;
	$username = $userInfo->username;
	$password = $userInfo->Password;
	$result= mysql_query('CALL Register_NewUser($userInfo,$emailID,$password)',$con);

	
	
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