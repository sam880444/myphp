<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>二維陣列</title>
</head>
<?php

	$arr = array(
			array(1,5,4,10),
			array(2,3),
			array(100,10,20)
			);
			
	for ($x=0;$x < count($arr); $x++){
		$sum = 0;
		for ($y=0; $y < count($arr[$x]); $y++){
			$sum += $arr[$x][$y];
		}
		echo "$x==> $sum \n";
	}
	
	
	echo "<hr>";
	
	

	for ($i = 0; $i < count($arr[0]); $i++){
		$sum = 0;

		for ( $j = 0;$j < count($arr); $j++){
			if( !isset($arr[$j][$i]) ){
				$sum  += 0;}
			else 
				{$sum += $arr[$j][$i];}	
		}
		echo "$i==> $sum \n";
	
	}


?>
<body>
</body>
</html>