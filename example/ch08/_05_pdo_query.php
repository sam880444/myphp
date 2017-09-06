<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>查詢表格的內容</title>
<style>
table {
	width: 100%;
}

.ta {
	background-color: #aba;
}

.tb {
	background-color: #cea
}

th {
	height: 50px;
}
</style>
</head>
<body>
	<?php
	echo "<h2 style='color:blue; text-align: center'>說明如何執行查詢(Select敘述)以及如何取出結果集內的資料</h2>";
	echo "<h4 style='color:brown; font-family: monospace; font-size: 20px'>\$pdo = new PDO('......');<br>";
	echo "\$pdoStmt = \$pdo->query(\$sql);<br>";
	echo "foreach(\$pdoStmt as \$row){;<br>";
	echo "  list(\$bookID, \$title, \$author, \$price, \$bookNo, \$company) = \$row;<br>";
	echo "  //顯示上面的變數 ;<br>";
	echo "};<br>";
	echo "</h4>";
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=proj;charset=utf8', 'root', 'root',
				  array(PDO::ATTR_EMULATE_PREPARES => false,
						PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
		);
		//$pdo->exec("set names utf8");
		$sql = "SELECT bookID, title, author, price, bookNo, companyID FROM book WHERE price > 800";
		echo "<table class='ta' border='2'>";
		echo "<tr><th>書籍流水號</th><th>作者</th>" .
				"<th>書名</th><th>價格</th>" .
				"<th>書號</th><th>出版社</th>" .
				"</tr>";
		/*
		//$pdo->query($sql): 執行參數所表示的SQL敘述。
                  傳回值為false(如果執行失敗)或是一個PDOStatement型別的物件。
                  如果執行的SQL敘述是Select敘述，則此物件其內含有SQL敘述所傳回的
                  結果集(result set)；如果執行的SQL敘述是DELETE, INSERT, 或UPDATE敘述
                  則傳回空的結果集。此時呼叫PDOStatement的rowCount()可得到受此SQL敘述影響
                   的記錄個數。		 
	    */
		
		$pdoStmt = $pdo->query($sql);
		
		foreach($pdoStmt as $row){
			echo "<tr>";
			list($bookID, $title, $author, $price, $bookNo, $company) = $row;
			echo "<td>$bookID</td>";
			echo "<td>$author</td>";
			echo "<td>$title</td>";
			echo "<td>$price</td>";
			echo "<td>$bookNo</td>";
			echo "<td>$company</td>";
			echo "</tr>";
		}
		echo "</table>";
	} catch(PDOException $ex){
	    echo "存取資料庫時發生錯誤，訊息:" . $ex->getMessage() . "<br>";
    }
    $link = null
?>
	<hr />
	<hr />
	<?php
	try {
      	$pdo = new PDO('mysql:host=localhost;dbname=proj;charset=utf8', 'root', 'root',
	            array(PDO::ATTR_EMULATE_PREPARES => false,
                     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    		 );
        $pdo->exec("set names utf8");
        $pdoStmt = $pdo->query($sql);
		echo "<table class='tb' border='3' >";
		echo "<tr><th>書籍流水號</th><th>作者</th>" .
	 		"<th>書名</th><th>價格</th>" .
	 		"<th>書號</th><th>出版社</th>" .
	 		"</tr>";
		while($row = $pdoStmt->fetch(PDO::FETCH_NUM)) {
    		echo "<tr>";
//    		echo "<td>" . $row['bookID'] . "</td>";
//    		echo "<td>" . $row['author'] . "</td>";
//    		echo "<td>" . $row['title']  . "</td>";
//    		echo "<td>" . $row['price']  . "</td>";
//    		echo "<td>" . $row['bookNo'] . "</td>";
//    		echo "<td>" . $row['companyID'] . "</td>";
    		echo "<td>" . $row[0] . "</td>";
    		echo "<td>" . $row[2] . "</td>";
    		echo "<td>" . $row[1]  . "</td>";
    		echo "<td>" . $row[3]  . "</td>";
    		echo "<td>" . $row[4] . "</td>";
    		echo "<td>" . $row[5] . "</td>";
    		echo "</tr>";
		}		
		echo "</table>";
		} catch(PDOException $ex){
			echo "發生資料庫存取錯誤，訊息:" . $ex->getMessage() . "<br>";
		}
		$link = null
?>
	
</body>
</html>
