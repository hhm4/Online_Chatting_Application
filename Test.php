<?php
$json_string = $_POST['userInfo'];
$userInfo = json_decode($json_string);
$username = $userInfo->username;
$password = $userInfo->Password;
$email1=$userInfo->Email;

echo $userInfo;
?>