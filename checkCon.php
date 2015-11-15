<?php
#error_reporting(0);

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)

// Report all errors except E_NOTICE

// Same as error_reporting(E_ALL);

$con=mysql_connect('sql2.njit.edu','hhm4','wKx8jxKXx');
if(!$con)
{
	print "Not connected";
}
$dbCon=mysql_select_db('hhm4', $con);
print "connected".$dbCon;
$sql=mysql_query('SELECT GroupName FROM CHATROOM_USERS', $con);

while($row = mysql_fetch_assoc($sql))
{
echo $row['GroupName'];

}
?>
