<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=encoding">
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