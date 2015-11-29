<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);
$interval=60; //minutes
set_time_limit(0);
while (true)
{
$now=time();
$sql=mysql_query("Update CONTACTS SET Contacts_Status=0", $con);
sleep($interval*60-(time()-$now));
}
?>