<?php
$json = $_POST['HTTP_JSON'];
$obj = json_decode($json,true);
$name = $obj['name'];
echo $name;	
?>