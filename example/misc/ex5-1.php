<!DOCTYPE html>
<html>
  <head>
     <meta charset='utf-8'>
     <title>EX 4-5</title>
  </head>
  <body>

<?php
	$s = "kitty!micky!snoopy!pinky";	
	$arr = explode('!', $s);			
	echo "Original: ";
	print_r($arr);
	echo "<br>";
	
	while (in_array('kitty', $arr))
	{
		array_splice($arr, array_search('kitty', $arr), 1);
	}		
		
	while (in_array('snoopy', $arr))
	{
		array_splice($arr, array_search('snoopy', $arr), 1);
	}
	

	echo "Final: ";
	print_r($arr);
	
?>
</body>
</html>
