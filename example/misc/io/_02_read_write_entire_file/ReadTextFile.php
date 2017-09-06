<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>Read entire file and write to another file</title>
</head>
<body>
	web page referenced: "http://php.net/manual/en/function.file-put-contents.php"
	<p />

	<hr>
	Reading the entire file from /example/ch02/ex02_02.php 
	and writing the contents to file /example/ch02/ex02_02.out.
	<hr>				
<?php
$in  = $_SERVER ["DOCUMENT_ROOT"] . "/example/ch02/ex02_02.php";
$out = $_SERVER ["DOCUMENT_ROOT"] . "/example/ch02/ex02_02.out";

if (file_exists($in)){
	$content = file_get_contents($in);
	file_put_contents($out, $content); // 原檔案內容會清空  
	echo "檔案:$in 已成功寫出<br>";
} else {
	echo "檔案:$in 不存在<br>";
}

?>
</p>
</body>
</html>