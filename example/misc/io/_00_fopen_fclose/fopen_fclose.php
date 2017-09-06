<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>Open and Close Files</title>
</head>
<body>
    Quoted from "http://www.tutorialspoint.com/php/php_files.htm" <p/>
	The PHP fopen() function is used to open a file.
	<br> It requires two arguments stating first the file name
	and then mode in which to operate.
	<p>
		mode: r, r+, w, w+, a, a+<br>
<hr>
Reading the file /example/ch02/ex02_02.php and sending all its
contents to the browser which issuing the request.   
<hr>				
<?php
$filename = $_SERVER["DOCUMENT_ROOT"] . "/example/ch02/ex02_02.php";
$fh = fopen ($filename , "r");
if ($fh) {
	$filesize = filesize( $filename );
	$filetext = fread( $fh, $filesize );
	fclose( $fh );
	
	echo  "File size : $filesize bytes" ;
	echo  "<pre>". htmlspecialchars($filetext) . "</pre>" ;
} else {
	echo "";
}
?>
</p>
</body>
</html>