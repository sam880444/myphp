<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>fetchAll()</title>
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
<hr/>
<hr/>
<?php
echo "<h2 style='color:blue; text-align: center'>說明如何新增一筆記錄到表格內</h2>";

try {
   $pdo = new PDO('mysql:host=localhost;dbname=proj;charset=utf8', 'root', 'root',
		           array(PDO::ATTR_EMULATE_PREPARES => false, 
    		       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    		     ); 
     
   $sql = "Insert Into book (bookID, title, author, price, companyID, bookNo, image, coverImage) values " . 
          "(?, ?, ?, ?, ?, ?, ?, ?)";

   $pdoStmt = $pdo->prepare($sql);
   $pdoStmt->bindValue(1, null);   // 因為此欄位為 AI
   $pdoStmt->bindValue(2, 'IPad使用大全', PDO::PARAM_STR);
   $pdoStmt->bindValue(3, '張小亞', PDO::PARAM_STR);
   $pdoStmt->bindValue(4, 1500, PDO::PARAM_INT);
   $pdoStmt->bindValue(5, 3, PDO::PARAM_INT);
   $pdoStmt->bindValue(6, rand(0,32767), PDO::PARAM_INT);
   $filename = 'bookA.jpg';
   $path = $_SERVER['DOCUMENT_ROOT'] .'/example/' . $filename;
   // $path = '/example/bookA.jpg';   //
   $bookImage = fopen($path,'rb');
   $pdoStmt->bindValue(7, $filename, PDO::PARAM_STR);
   $pdoStmt->bindParam(8, $bookImage, PDO::PARAM_LOB);
   $pdoStmt->execute();
   $num = $pdoStmt->rowCount();
   echo "新增記錄的筆數=$num<br>";
} catch(PDOException $ex){
		echo "存取資料庫時發生錯誤，訊息:" . $ex->getMessage() . "<br>";
		echo "行號:" . $ex->getLine() . "<br>";
		echo "堆疊:" . $ex->getTraceAsString() . "<br>";
} 
$link = null
?>
<hr/>
<hr/>
<?php
/*
$pdo = new PDO('mysql:host=localhost;dbname=proj;charset=utf8', 'root', 'root',
	           array(PDO::ATTR_EMULATE_PREPARES => false, 
                     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    		 ); 
$pdoStmt = $pdo->query($sql);
echo "<table class='tb' border='3' >";
echo "<tr><th>書籍流水號</th><th>作者</th>" .
	 "<th>書名</th><th>價格</th>" .
	 "<th>書號</th><th>出版社</th>" .
	 "</tr>";
$arr2D = $pdoStmt->fetchAll(PDO::FETCH_ASSOC);
foreach($arr2D as $row) {
    echo "<tr>";
    echo "<td>" . $row['bookID'] . "</td>";
    echo "<td>" . $row['author'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['bookNo'] . "</td>";
    echo "<td>" . $row['companyID'] . "</td>";
    echo "</tr>";
}
echo "</table>";
$link = null
*/
?>
</body>
</html>
