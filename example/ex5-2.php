<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>Untitled Document</title>
</head>
<?php

$arr1 = array(1,2,3,4,5,6,7) ;
$rand_num = rand(1,7);

print_r($rand_num);
echo "<hr>";
$arr2 = array();

foreach ($arr1 as $val) {
	if (stristr($val, "$rand_num") == false ) {
		array_push($arr2, $val);
		}
	}
print_r($arr2);  
?>
<body>
</body>
</html>