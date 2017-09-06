<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title></title>
</head>
<body>

	<p />
	<hr>

	<hr>				
<?php
$result = array ();
$sourceDir = $_SERVER ["DOCUMENT_ROOT"] . "/example";
findFiles ( $sourceDir, $result, '.php' );
// $count = 0 ;
$successOLD = 0 ; 
$successPHP = 0 ;
foreach ( $result as $k => $inFile ) {
	$file = basename ( $inFile, ".php" );
	$outFile = substr ( $inFile, 0, strrpos ( $inFile, "/" ) ) . "/" . $file . ".out";
	changeTags ( $inFile, $outFile );
	$old = substr ( $inFile, 0, strrpos ( $inFile, "/" ) ) . "/" . $file . ".old";
	if (rename($inFile, $old)){
		$successOLD++;
	};
	if (rename($outFile, $inFile)){
		$successPHP++;
	};
}
echo "Success OLD=$successOLD, Success PHP=$successPHP<br>";
/*
 * 本函數由指定的資料夾開始，尋找所有的副檔名為$type的檔案。
 * 如果未指定$type，取出所有檔案
 */
function findFiles($dir, & $result, $type = FALSE) {
	// passed by reference ==> & $result
	$arr = scandir ( $dir ); // 取出$dir下所有的檔案與資料夾。
	foreach ( $arr as $k => $v ) {
		if (! ($v == '.' || $v == '..')) {
			$path = $dir . "/" . $v;
			if (is_dir ( $path )) {
				findFiles ( $path, $result, $type );
			} else {
				// echo "檔案==>$path";
				if (! $type) {
					
					$result [] = $path;
				} else {
					
					if (endsWith ( $path, $type )) {
						
						$result [] = $path;
					}
				}
			}
		} else {
			// echo "Dir==>. .. <br>";
		}
	}
	// return $result;
}
function changeTags($in, $out) {
	$fin = fopen ( $in, "r" );
	$fout = fopen ( $out, "w" );
	
	if ($fin) {
		$count = 0;
		while ( $line = fgets ( $fin ) ) {
			$count ++;
			if ($count == 1) {
				if (! startsWith ( trim ( $line ), "<!DOCTYPE" )) {
					fwrite ( $fout, "<!DOCTYPE html>\n" );
					fwrite ( $fout, toLower ( $line ) );
				} else {
					fwrite ( $fout, "<!DOCTYPE html>\n" );
				}
			} else {
				if (($index = strpos ( $line, "<META" )) !== FALSE || 
					($index = strpos ( $line, "<meta" )) !== FALSE) {
					fwrite ( $fout, substr ( $line, 0, $index ) . "<meta charset='utf-8'>\n" );
				} else if (($index = strpos ( $line, "<HTML" )) !== FALSE ||
					($index = strpos ( $line, "<html" )) !== FALSE) {
						fwrite ( $fout, substr ( $line, 0, $index ) . "<html>\n" );
				} else {
						fwrite ( $fout, toLower ( $line ) );
					}
			 }
		}
		echo "檔案:$in 已成功寫出<br>";
	} else {
		echo "檔案:$in 不存在<br>";
	}
	fclose ( $fin );
	fclose ( $fout );
}
// ------------------------
function toLower($line) {
	$text = preg_replace ( "/(<\/?\w+)(.*?>)/e", "strtolower('\\1') . '\\2'", $line );
	$text = str_replace ( '"', '"', $text );
	return $text;
}
function startsWith($haystack, $needle) {
	$length = strlen ( $needle );
	return (substr ( $haystack, 0, $length ) === $needle);
}
function endsWith($haystack, $needle) {
	$length = strlen ( $needle );
	if ($length == 0) {
		return true;
	}
	
	return (substr ( $haystack, - $length ) === $needle);
}
?>
</p>
</body>
</html>