<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>ch05/listExample</title>
</head>
<body>
<?php
$info = array(1, "FLASH CS4 互動網頁設計", "黃鈺琦", 550, "學貫", "I477");
list($bookID, $title, $author, $price, $company, $bookNo) = $info;
echo "書籍流水號 = $bookID <br>";
echo "作者 =  $author <br>";
echo "書名 =  $title <br>";
echo "價格 =  $price <br>";
echo "書號 =  $bookNo <br>";
echo "出版社 =  $company <br>";

?>
</body>
</html>
