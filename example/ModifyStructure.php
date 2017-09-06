<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SYSTEM_NAME; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php

$conn = mysql_connect("localhost", "root", "root") or  die("無法建立連線");

mysql_query("SET NAMES 'utf8'");
if ( ! mysql_select_db("proj") ) 	die("無法開啟資料庫proj");
// 修改Friends表格
$result = mysql_query("ALTER TABLE `friends` ADD `uniColumn` INT NOT NULL ");
if ($result ){
	mysql_query("Update `friends` set uniColumn = sno");
	mysql_query("ALTER TABLE `friends` ADD UNIQUE (`uniColumn`)");
	mysql_query("ALTER TABLE  `friends` ENGINE = INNODB");
	echo "更改表格結構成功<br><hr>";
} else {
	echo "不需要更改表格結構<br><hr>";
}
?>
</body></html>