<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>建立資料連線</title>
</head>
<body>
<?php
	echo "<h2 style='color:blue; text-align: center'>本程式說明如何利用PDO類別來建立與資料庫的連線</h2>";
	echo "<h4 style='color:brown; font-family: monospace; font-size: 20px'>" . 
	"\$pdo = new PDO('mysql:host=localhost; port=3306; dbname=proj; charset=utf8', <br>" .
    " 'root', 'root',<br>" .
	"array(<br>";
	echo " PDO::ATTR_EMULATE_PREPARES=>false,<br>";
	echo " PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,<br>";
	echo " PDO::ATTR_PERSISTENT => true<br>";
	echo ")   );</h3>";
	//
	// 產生PDO類別的實例就會建立MySQL資料庫的連線。
	// $pdo = new PDO(string $dsn [, string $username [, string $password [, array $options ]]]);
	// 第一個參數($dsn)的格式：
	//  mysql:host=localhost; port=3306; dbname=proj; charset=utf8
	//  mysql:	表示要與MySQL資料庫連線
	//  host:	主機名稱或主機的IP
	//  port:	說明MySQL資料庫傾聽的埠號(Port No)，預示値為3306
	//  dbname:	要存取的資料庫名稱(本例為proj)
	//  charset:由資料庫取出的資料要轉換為何種編碼
	// 第二個參數($username):	使用資料庫的帳號(root)
	// 第三個參數($password):	使用資料庫的密碼(root)
	// 第四個參數($options): 資料庫驅動程式的選項, 此參數是一個陣列，內含資料庫驅動程式的選項。 
	//    PDO::ATTR_EMULATE_PREPARES=> false
	//         當使用PDO來存取MySQL資料庫時，預設的設定是使用模擬的prepared statements
	//         而非真正的 prepared statements(為了配合舊式的MySQL資料庫)。    
	//         此選項通知PDO不要使用模擬的prepared statements。
	//         real prepared statements are not used by default.
	//         To fix this you have to disable the emulation of prepared statements.
	//    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
	//    採用例外處理機制來處理存取資料庫時程式遇到的非正常情況(稱為例外)
	//    PDO::ATTR_PERSISTENT => true
	//    使用持續性連線(persistent connections)。
	//    此參數一定在array()內設定，不能在建好PDO實例後另外用敘述設定。
	//    在建好PDO實例後另外以下列敘述設定是無效的：
	//    $pdo->setAttribute(PDO::ATTR_PERSISTENT, true);  // <--- NG
	//  建立的連線會隨著PDO物件的存在一直保持有效直到PDO物件被回收為止。
	//  只要將所有儲存著PDO物件參考的變數設為null，PDO物件就會被回收。
	//  The connection remains active for the lifetime of that 
	//  PDO object. To close the connection, you need to destroy 
	//  the object by ensuring that all remaining references to it are deleted--you do this by assigning NULL to the variable that holds the object. If you don't do this explicitly, PHP will automatically close the connection when your script ends.
	try {
		//  
    	$pdo = new PDO('mysql:host=localhost; port=3306; dbname=proj; charset=utf8', 'root', 'root', 
	    	     array(PDO::ATTR_EMULATE_PREPARES=>false, 
			       PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, 
    			       PDO::ATTR_PERSISTENT => true
	    	     	  )
        );            
    	// $pdo->exec("set names utf8");   // PHP 5.3.6 以前的版本 charset=utf8是無效的，必須使欲用此敘述
        echo "成功建立連線(PDO)<br>";
	} 
	catch(PDOException $ex){
		echo "存取資料庫時發生錯誤，訊息:" . $ex->getMessage() . "<br>";
		echo "行號:" . $ex->getLine() . "<br>";
		echo "堆疊:" . $ex->getTraceAsString() . "<br>";
	} 
	?>	
</body>
</html>