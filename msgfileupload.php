<?php
require 'Connections.php';

$upload_dir = '/afs/cad/u/h/h/hhm4/public_html/UPLOADS';
//$upload_dir_db = 'C:\\\Users\\\Kumi\\\Desktop\\\phpUpload';
if(is_uploaded_file($_FILES['userfile']['tmp_name']))
{
	$dest = $_FILES['userfile']['name'];
//	$dest_db = "\\\\".$dest;
//	$store_dir = $upload_dir_db.$dest_db;
	echo "$store_dir";
//	$moveBool = false;
	$moveBool = move_uploaded_file($_FILES['userfile']['tmp_name'], "$upload_dir\\$dest");
	
/*	if($moveBool)
	{
		$myConnection= mysqli_connect("localhost","root","root", "test_user") or die ("could not connect to mysql"); 
		$query="INSERT INTO FileUpload(Path) values ('$store_dir')";
		$result=mysqli_query($myConnection, $query) or die(mysql_error()); 
	}	
*/	
}
else
{
	echo "Possible file upload attack: ";
	echo "filename '".$_FILES['userfile']['tmp_name'] ."'.";
	print_r($_FILES);
}
?>