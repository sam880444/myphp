<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title><?php echo SYSTEM_NAME; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php

$conn = mysql_connect("localhost", "root", "root") or  die("無法建立連線");

mysql_query("SET NAMES 'utf8'");
if ( ! mysql_select_db("proj") ) 	die("無法開啟資料庫proj");
mysql_query("BEGIN");
$a1 = mysql_query("INSERT INTO friends  VALUES(null, 'Mary', '06-22334455', 111)");
if ($a1){
	echo "第一次新增記錄成功<br>";
} else {
	echo "第一次新增記錄失敗<br>";
}
printf("最後一上次新增的Last inserted record has id %d<br>", mysql_insert_id());
$a2 = mysql_query("INSERT INTO friends  VALUES(null, 'John', '07-45789555', 112)");
if ($a2){
	echo "第二次新增記錄成功<br>";
} else {
	echo "第二次新增記錄失敗<br>";
}
printf("最後一上次新增的Last inserted record has id %d<br>", mysql_insert_id());
$a3 = mysql_query("delete from  friends  where sno = 300");
if ($a3){
	echo "更新第一筆記錄成功 $a3<br>";
} else {
	echo "更新第一筆記錄失敗 $a3<br>";
}

if ($a1 and $a2 and $a3) {
	mysql_query("COMMIT");
	echo "由於所有異動都成功，所以對『交易』進行COMMIT<br>";
} else {
	mysql_query("ROLLBACK");
	echo "由於有一個異動失敗，所以對『交易』進行ROLLBACK<br>";
}

?>
</body>
</html>
