<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title><?php echo SYSTEM_NAME; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
 $arr = getallheaders();
 foreach($arr as $key=>$value){
 	echo   "$key--->$value<br>"; 
 }
 echo "<hr>";
 
 echo $_SERVER['HTTP_X_REQUESTED_WITH'] . "<br>";
?>
</body>
</html>
