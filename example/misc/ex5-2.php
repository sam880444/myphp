<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>Insert title here</title>
</head>

    <body>
    <?php

	$arr = array(1, 2, 3, 4, 5, 6, 7);
	
	echo "Original: ";
	print_r($arr);
	
	$r = rand(1, 7);					
	echo "<br>Random no: $r<br>";
	
	while (in_array($r, $arr))
		array_splice($arr, array_search($r, $arr), 1);
	
	echo "Result: ";
	print_r($arr);
    ?>
    </body>
</html>