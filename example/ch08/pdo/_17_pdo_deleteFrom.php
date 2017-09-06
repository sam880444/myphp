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
<hr/>
<hr/>
<?php
echo "<h2 style='color:blue; text-align: center'>說明如何新增一筆記錄到表格內</h2>";
echo "<h4 style='color:brown; font-family: monospace; font-size: 22px'>\$pdo = new PDO('......');<br>";
echo "\$pdoStmt = \$pdo->query(\$sql);<br>";
echo "\$arr2D = \$pdoStmt->fetchAll(PDO::FETCH_NUM);<br>";
echo "foreach(\$arr2D as \$row){<br>";
echo " &nbsp;&nbsp;元素的識別資訊為0開始的連續整數...<br>";
echo "}<br>";
echo "或;<br>";
echo "\$arr2D = \$pdoStmt->fetchAll(PDO::FETCH_ASSOC);<br>";
echo "foreach(\$arr2D as \$row){<br>";
echo " &nbsp;&nbsp;元素的識別資訊為欄位名稱<br>";
echo "}<br>";
echo "</h4>";
try {
   $pdo = new PDO('mysql:host=localhost;dbname=proj;charset=utf8', 'root', 'root',
		           array(PDO::ATTR_EMULATE_PREPARES => false, 
    		       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    		     ); 
     
   $sql = "Insert Into Book (bookID, title, author, price, companyID, bookNo, image, coverImage) values " . 
        "(?, ?, ?, ?, ?, ?, ?, ?)";

   $pdoStmt = $pdo->prepare($sql);
   $pdoStmt->bindValue(1, null);   // 因為此欄位為 AI
   $pdoStmt->bindValue(2, '測試書名', PDO::PARAM_STR);
   $pdoStmt->bindValue(3, '章軍亞', PDO::PARAM_STR);
   $pdoStmt->bindValue(4, 500, PDO::PARAM_INT);
   $pdoStmt->bindValue(5, 2, PDO::PARAM_INT);
   $pdoStmt->bindValue(6, rand(0,32767), PDO::PARAM_INT);
   $filename = 'bookA.jpg';
   $path = $_SERVER['DOCUMENT_ROOT'] .'example/bookA.jpg';
   // $path = '/example/bookA.jpg';   //表示c:\之下的/example/bookA.jpg
   $bookImage = fopen($path,'rb');
   $pdoStmt->bindValue(7, $filename, PDO::PARAM_STR);
   $pdoStmt->bindValue(8, $bookImage);
   $pdoStmt->execute();
   $num = $pdoStmt->rowCount();
   echo "num=$num<br>";
} catch(PDOException $ex){
		echo "存取資料庫疵發生錯誤，訊息:" . $ex->getMessage() . "<br>";
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
