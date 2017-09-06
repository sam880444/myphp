<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>取得執行 SELECT 陳述式時，被影響的記錄及欄位數目。</title>
  </head>
  <body>
    <?php
      error_reporting(E_ERROR | E_PARSE);
      $conn = mysql_connect("localhost", "root", "root") or die("無法建立連線" . mysql_error()); 
      mysql_query("SET NAMES 'utf8'");
      if ( ! mysql_select_db("proj") ) { // 如果無法連上
		die("Can't select database");    
	  }
      $sql = "SELECT bookID, title, author, price, bookNo, companyID FROM book WHERE price > 100";
      $result = mysql_query($sql, $conn);
      list($bookID, $title, $author, $price, $bookNo, $company) = mysql_fetch_row($result);
      echo "書籍流水號 = $bookID <br>";      	
      echo "作者 =  $author <br>";
      echo "書名 =  $title <br>";
      echo "價格 =  $price <br>";
      echo "書號 =  $bookNo <br>";
      echo "出版社 =  $company <br>";
      
      mysql_close($conn);
    ?> 
  </body>
</html>
