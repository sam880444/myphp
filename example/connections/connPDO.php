<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conn = "localhost";
$database_conn = "proj";
$username_conn = "root";
$password_conn = "root";
/*
$conn = mysql_connect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES 'utf8' ");
*/
try {
	$pdo = new PDO("mysql:host=localhost; port=3306; dbname=$database_conn; charset=utf8", $username_conn, $password_conn,
			array(PDO::ATTR_EMULATE_PREPARES=>false,
					PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_PERSISTENT => true
			)
	);
	//$pdo->exec("set names utf8");   // PHP 5.3.6 以前的版本 charset=utf8是無效的，必須使欲用此敘述
	//echo "成功建立連線(PDO)<br>";
}
catch(PDOException $ex){
	echo "存取資料庫時發生錯誤，訊息:" . $ex->getMessage() . "<br>";
	echo "行號:" . $ex->getLine() . "<br>";
	echo "堆疊:" . $ex->getTraceAsString() . "<br>";
}

?>