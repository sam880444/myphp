<?php
     $hostname = "localhost";
	$username="root";
	$password="root";
	$database="mystore";

$param = "1";
if(array_key_exists("id", $_GET)) {
$param = $_GET['id']; 
}

try {
	$pdo = new PDO("mysql:host=$hostname; port=3306; dbname=$database; charset=utf8", $username, $password,
			array(PDO::ATTR_EMULATE_PREPARES=>false,
					PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
					PDO::ATTR_PERSISTENT => true
			)
	);
	$pdo->exec("set names utf8");   // PHP 5.3.6 以前的版本 charset=utf8是無效的，必須使欲用此敘述
	
    $query = "select ModelNumber,ModelName from Products where CategoryID='$param'";
    $pdoStmt = $pdo->prepare($query);
    $pdoStmt->execute();
    
	$products = array();	

     while($row=$pdoStmt->fetch(PDO::FETCH_ASSOC)){
            $products[] =$row;
        }	
	
	header("Content-Type: application/json; charset=utf-8");
 
echo json_encode($products);

//將資料使用Json編碼傳回並解決中文亂碼的問題
//echo JSON($products);
$pdo = null;

}
catch(PDOException $ex){
	echo "存取資料庫時發生錯誤，訊息:" . $ex->getMessage() . "<br>";
	echo "行號:" . $ex->getLine() . "<br>";
	echo "堆疊:" . $ex->getTraceAsString() . "<br>";
}

function JSON($array) { 
    arrayRecursive($array, 'urlencode', true); 
    $json = json_encode($array); 
    return urldecode($json); 
} 
function arrayRecursive(&$array, $function, $apply_to_keys_also = false){ 
    static $recursive_counter = 0; 
    if (++$recursive_counter > 1000) { 
        die('possible deep recursion attack'); 
    } 
    foreach ($array as $key => $value) { 
        if (is_array($value)) { 
            arrayRecursive($array[$key], $function, $apply_to_keys_also); 
        } else { 
            $array[$key] = $function($value); 
        }                                        
        if ($apply_to_keys_also && is_string($key)) { 
            $new_key = $function($key); 
            if ($new_key != $key) { 
                $array[$new_key] = $array[$key]; 
                unset($array[$key]); 
            } 
        } 
    } 
    $recursive_counter--; 
}     	
	
?>