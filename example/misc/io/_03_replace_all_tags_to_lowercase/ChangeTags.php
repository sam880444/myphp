<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>change html tag to lowercase</title>
</head>
<body>

	<p />
	<hr>
	
	<hr>				
<?php

$in = $_SERVER["DOCUMENT_ROOT"] . "/example/ch02/HelloWorld.php";
echo basename($in, '.php') . "<br>";

$out = $_SERVER["DOCUMENT_ROOT"] . "/example/ch02/HelloWorld.out";
$fin  = fopen( $in, "r" );
$fout = fopen( $out, "w" );

if ($fin) {
	$count = 0 ;
	while ($line = fgets($fin)) {
	    $count++;
	    if ($count == 1 && !startsWith(trim($line), "<!DOCTYPE")){
	    	fwrite($fout, "<!DOCTYPE html>\n");
	    	fwrite($fout, toLower($line));
	    } else if (($index = strpos($line, "<META") )!= FALSE) {
	    	fwrite($fout, substr($line, 0, $index) . "<meta charset='utf-8'>\n");
	    } else {
		
	    fwrite($fout, toLower($line));
	    }
	}
	echo "檔案:$in 已成功寫出<br>";
} else {
	echo "檔案:$in 不存在<br>";
}
fclose($fin);
fclose($fout);
//------------------------
function toLower($line) {
   return preg_replace("/(<\/?\w+)(.*?>)/e", "strtolower('\\1') . '\\2'", $line);
}
function startsWith($haystack, $needle)
{
	$length = strlen($needle);
	return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
	$length = strlen($needle);
	if ($length == 0) {
		return true;
	}

	return (substr($haystack, -$length) === $needle);
}
?>
</p>
</body>
</html>