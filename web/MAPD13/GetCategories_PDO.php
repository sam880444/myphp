<?php
     $hostname = "localhost";
	$username="root";
	$password="root";
	$database="mystore";

//header("Content-Type:text/html; charset=utf-8");
try {
	$pdo = new PDO("mysql:host=$hostname; port=3306; dbname=$database; charset=utf8", $username, $password,
			array(PDO::ATTR_EMULATE_PREPARES=>false,
					PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_PERSISTENT => true
			)
	);
	$pdo->exec("set names utf8");   // PHP 5.3.6 以前的版本 charset=utf8是無效的，必須使欲用此敘述
	
    $query = "select * from Categories";
    $pdoStmt = $pdo->prepare($query);
    $pdoStmt->execute();
    
	$categories = array();	

     while($row=$pdoStmt->fetch(PDO::FETCH_ASSOC)){
            $categories[] =$row;
        }	
	
	header("Content-Type: application/json; charset=utf-8");
 
echo json_encode($categories);

$pdo = null;

}
catch(PDOException $ex){
	echo "存取資料庫時發生錯誤，訊息:" . $ex->getMessage() . "<br>";
	echo "行號:" . $ex->getLine() . "<br>";
	echo "堆疊:" . $ex->getTraceAsString() . "<br>";
}

?>