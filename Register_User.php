<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysqli_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$usernam= 'rrr';
$email='gggg';
$pwd='123';
$dbCon=mysqli_select_db($config['database'], $con);
print "connected".$dbCon;
$sql=mysqli_prepare('CALL Testing()', $con);

while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC))
{
echo $row['GroupName'];
}




?>