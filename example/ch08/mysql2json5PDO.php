<?php
/*** shinder.lin@gmail.com
for PHP5
*/
function mysql2json5($sql) {
	try {
		$pdo = new PDO ( 'mysql:host=localhost;dbname=proj;charset=utf8', 'root', 'root', array (
				PDO::ATTR_EMULATE_PREPARES => false,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
		) );
		$pdoStmt = $pdo->query ( $sql );
		$arr2D = $pdoStmt->fetchAll ( PDO::FETCH_ASSOC );
		$ar = array ();
		foreach ( $arr2D as $row ) {
			$obj = array ();
			foreach ( $row as $key => $value ) {
				$obj [$key] = $value;
			}
			array_push ( $ar, $obj );
		}
	} catch ( PDOException $ex ) {
		echo "存取資料庫時發生錯誤，訊息:" . $ex->getMessage () . "<br>";
	}
	return json_encode ( $ar );
}
?>