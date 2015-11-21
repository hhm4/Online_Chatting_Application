<?php

//function upload_file()
//{
//	$upload_dir = 'C:\Users\Kumi\Desktop\phpUpload';
	$upload_dir = '/afs/cad/u/h/h/hhm4/public_html/UPLOADS/';
//	$upload_dir_db = 'C:\\\Users\\\Kumi\\\Desktop\\\phpUpload';

	if(is_uploaded_file($_FILES['userfile']['tmp_name']))
	{
		$dest = $_FILES['userfile']['name'];
		echo $dest;
//		$dest_db = "\\\\".$dest;
//		$store_dir = $upload_dir_db.$dest_db;
//		echo "$store_dir";
		$moveBool = false;
		$moveBool = move_uploaded_file($_FILES['userfile']['tmp_name'], "$upload_dir/$dest");
	
		if($moveBool)
		{
			print_r	('Success');	
		}
	
	}
	else
	{
		echo "Possible file upload attack: ";
		echo "filename '".$_FILES['userfile']['tmp_name'] ."'.";
		print_r($_FILES);
	}
//}
?>