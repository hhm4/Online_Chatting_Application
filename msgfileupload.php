<?php
echo "hi";
upload_file();

function upload_file()
{
	$FromUserId = $_POST['FromUserId'];
//	$upload_dir = 'C:\Users\Kumi\Desktop\phpUpload';
echo $ FromUserId;
/*echo "hello0";
	$upload_dir = '/afs/cad/u/h/h/hhm4/public_html/UPLOADS/';
//	$upload_dir_db = 'C:\\\Users\\\Kumi\\\Desktop\\\phpUpload';
echo "hello1";
print_r($_FILES);
	if(is_uploaded_file($_FILES['userfile']['tmp_name']))
	{
		echo "hello2";
		$dest = $_FILES['userfile']['name'];
		print_r($_FILES);
		echo $dest;
		echo $upload_dir/$dest;
//		$dest_db = "\\\\".$dest;
//		$store_dir = $upload_dir_db.$dest_db;
//		echo "$store_dir";
		$moveBool = false;
		$moveBool = move_uploaded_file($_FILES['userfile']

['tmp_name'], "$upload_dir/$dest");
	
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
	}*/
}
?>