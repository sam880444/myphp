<!DOCTYPE html>
<html>
  <head>
     <meta charset='utf-8'>
     <title>ch03/variable04.php</title>
  </head>
  <body>
    <?php
		define("PI", 3.1415962);
		$r = 10 ;
		$area = PI * $r * $r ; // * 表示乘法運算子
		echo "area=" . $area ;
    ?>
</body> 
</html>