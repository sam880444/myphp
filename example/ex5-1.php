<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>Untitled Document</title>
</head>
<?php

$str='kitty!micky!snoopy!pinky';
$arr1 = explode('!', $str) ; 

$arr2 = array();

foreach ($arr1 as $val) {
	if (stristr($val, "kitty") == false && 
		stristr($val, "snoopy") == false) {
		array_push($arr2, $val);
		}
	}
	
print_r($arr2);  

?>
<body>
</body>
</html>