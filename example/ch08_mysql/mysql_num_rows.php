<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>取得執行 SELECT 陳述式時，被影響的記錄及欄位數目。</title>
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
      $sql = "SELECT bookID, price, title, author FROM book WHERE price > 500";
      $result = mysql_query($sql, $conn);
			
      echo "挑選出來的紀錄有 " . mysql_num_rows($result) . " 筆";
      echo "，包含 " . mysql_num_fields($result) . " 個欄位。";
			
      mysql_close($conn);
    ?> 
  </body>
</html>
