<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=mysql_connect($config['host'],$config['username'],$config['password']);
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db($config['database'], $con);

$emailID = 'jiljungjak@jj.com';
$username = 'shoot the kuruvi';
$password = 'radha ravi';
	
	$query = mysql_query('CALL TESTING()',$con);
	while($row = mysql_fetch_assoc($query))
   {
     echo $row['USERNAME'];
   }

	

}
?>