<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>我的第一個PHP程式</title>
</head>
    <body>
    <?php
    	/*
    	 	這是一個簡單的範例程式
    	 */
//     for( $n = 1; $n <= 3; $n++){//變數前面要有$
// 		echo("Hello World!,大家好") . "<br>";//不換行
// 		echo"伺服器上的時間為" . date("Y/m/d H:i:s") ."<br><br>";//用.合併"Y/m/d H:i:s"
//     }
	$s = 'a\\b\';$t=\'c';//印字串ab';$t='c 用\ (印出\打\\)
	echo '$s=' . $s ."<br>";
	
	$n = 1;
	$y = 110;
	
	echo'n=' . $n . ', y=' . $y . "<br>";
	echo"n=$n, y=$y<br>";
	$user = "Mary";
	echo "Hello,$user"; //$user = Mary 
	echo "<br>";
	$user = "Mary";
	echo 'Hello,$user';
	echo "<br>";
	
	$str = "Joan";
	echo "There are many {$str}s in my school.<br>";//$str s會留空格$strs變成變數故要加{}
	?>
    </body>
</html>