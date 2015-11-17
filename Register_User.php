<?php
$config=parse_ini_file("/afs/cad/u/h/h/hhm4/public_html/.mysql.ini",false,true);
$con=new PDO(mysql:host=$config['host'],dbname=$config['database'],$config['username'],$config['password']);
$sql= "CALL Testing()";
$result= $con->prepare($sql);
$result->setFetchMode(PDO:: FETCH_ASSOC);
$result->execute();
while($value=result-> fetch()
{
	print "<pre>";
	print_r($value);
	
	
	
}

?>