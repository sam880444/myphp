<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>產生五個亂數</title>
</head>
<?php

$arr = array();
	
while( count($arr) < 5){
	$num = rand(1,39);
	$arr[]=$num;
}

print_r($arr);


?>
<body>
</body>
</html>

