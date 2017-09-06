<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>取得執行 SELECT陳述式時</title>
<style>
table {
   
    width: 100%;
}
.ta {
   
    background-color: #D9E498;
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
$pdo = new PDO('mysql:host=localhost;dbname=proj;charset=utf8', 'root', 'root',
		           array(PDO::ATTR_EMULATE_PREPARES => false, 
    		       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    		     ); 
     
$sql = "SELECT bookID, title, author, price, bookNo, companyID FROM book WHERE price > 500";
echo "<table class='ta' border='2'>";
echo "<tr><th>書籍流水號</th><th>作者</th>" .
	 "<th>書名</th><th>價格</th>" .
	 "<th>書號</th><th>出版社</th>" .
	 "</tr>";
$pdoStmt = $pdo->query($sql);
//
//echo $arr->rowCount() . "<br>";
foreach($pdo->query($sql) as $row){
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
$link = null
?>
</body>
</html>
