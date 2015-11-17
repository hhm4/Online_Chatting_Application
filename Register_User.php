<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$usernam= 'rrr';
$email='gggg';
$pwd='123';
$dbCon=mysql_select_db($config['database'], $con);
print "connected".$dbCon;
if(!(mysql_query('CALL TESTING($usernam,$email,$pwd)', $con))
{
	echo "Prepare failed: (" . $mysql_errno() . ") " . $mysql_error();
	
};
while($row = mysql_fetch_assoc($sql))
{
echo $row['GroupName'];
}

?>