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
	$username = 'shoot the kuruvi name';
	$password = '123';
	$sql=mysql_query("CALL Testing()",$con);
	while($row = mysql_fetch_assoc($sql))
{
echo $row['UserName'];
}



?>