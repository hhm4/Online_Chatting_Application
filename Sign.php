<?php

if( $_POST["name"] || $_POST["email"] || $_POST["contact"])
{
echo "Welcome: ". $_POST['name'];
echo "Your Email is: ". $_POST["email"];
echo "Your Mobile No. is: ". $_POST["contact"];
}

?>