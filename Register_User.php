<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
print "connected".$dbCon;
$emailID = 'fff@fff';
$username = 'ddd';
$password = 'ddd';
$sql=mysql_query('CALL Register_Test($emailID,$username,$password)', $con);
while($row = mysql_fetch_assoc($sql))
{
echo $row['UserIds'];
}
?>