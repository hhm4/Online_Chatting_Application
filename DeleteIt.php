<?php
// Example 1
$pizza  = "piece1;piece2;piece3;piece4;piece5;piece6";
$pieces = explode(";", $pizza);

foreach ($pieces as $p)
{
	
	echo "Current Value ".$p;
	
}
echo count($pieces);
echo $pieces[0]; // piece1
echo $pieces[1]; // piece2

?>