<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>執行 SELECT 敘述</title>
  </head>
  <body>
    <?php
      error_reporting(E_ERROR | E_PARSE);
    
      $conn = mysql_connect("localhost", "root", "root") 
              or  die("無法對資料庫建立連線"); 
              
      mysql_query("SET NAMES 'utf8'");
      if ( ! mysql_select_db("proj") ) { // 如果無法開啟資料庫
		die("無法開啟資料庫proj");    
	  }
      $selectSQL = "SELECT  bookID, title, author, price, bookNo, companyID, " .
                   "  CoverImage from book where price >= 100" ;
	  $result = mysql_query($selectSQL, $conn);
      echo "價格 >= 100之書籍資料筆數=" . mysql_num_rows($result) . "<br>";       
      mysql_close($conn);
    ?> 
  </body>
</html>
