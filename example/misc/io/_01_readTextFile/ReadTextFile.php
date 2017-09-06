<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>Reading text file line by line</title>
</head>
<body>
	Quoted from "http://www.felixgers.de/teaching/php/fileIO.html"
	<p />
	<hr>
	Reading the file: /example/ch02/ex02_02.php line by line
	and writing each line to file /example/ch02/ex02_02.out.
	<hr>				
<?php
$in = $_SERVER ["DOCUMENT_ROOT"] . "/example/ch02/ex02_02.php";
$out = $_SERVER ["DOCUMENT_ROOT"] . "/example/ch02/ex02_02.out";
$fin  = fopen ( $in, "r" );
$fout = fopen ( $out, "w" );
if ($fin) {
	while ($line = fgets($fin)) {
	    fwrite($fout, $line);
	}
	echo "檔案:$in 已成功寫出<br>";
} else {
	echo "檔案:$in 不存在<br>";
}
fclose($fin);
fclose($fout);
?>
</p>
</body>
</html>