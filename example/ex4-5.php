<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>產生亂數</title>
</head>
<?php

$arr = array();
	
for ( $i=1 ; $i <=4 ; $i++){
	$rand_num = rand(1,10) - 1;
	array_push($arr, $rand_num);
}

print_r($arr);

?>
<body>
</body>
</html>