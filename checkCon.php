<?php

$config=parse_ini_file("/afs/cad/u/h/h/hhm4/mysql.ini",false,true);
if (parse_ini_file("/afs/cad/u/h/h/hhm4/mysql.ini",false,true){
	print 'hari';
}
echo $config;
echo $config['host'];
echo $config['username'];
echo $config['password'];
echo $config['database'];
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
print "connected".$dbCon;
$sql=mysql_query('SELECT GroupName FROM CHATROOM_USERS', $con);

while($row = mysql_fetch_assoc($sql))
{
echo $row['GroupName'];

}
?>
