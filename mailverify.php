<?php
$to = "sheikfasil@gmail.com";
$subject = "this camr from mother";

$name = 'Kumaran';
$email = 'sheikfasil@gmail.com';
$message= "Hi I am gud";
$subject  = "My Subject";
$header ='$email';
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
//mailto($to, $subject, $message, $header);
mail($email, $subject, $message);
print_r('mail success');

?>
