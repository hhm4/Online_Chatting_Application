<?php

if( $_POST["name"] || $_POST["email"] || $_POST["contact"])
{
echo "Welcome: ". $_POST['name']. "<br />";
echo "Your Email is: ". $_POST["email"]. "<br />";
echo "Your Mobile No. is: ". $_POST["contact"];
}

?>