<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>執行 UPDATE 陳述式時，被影響的記錄數目</title>
  </head>
  <body>
    <?php
      error_reporting(E_ERROR | E_PARSE);
      $conn = mysql_connect("localhost", "root", "root") or die("無法連上伺服器：" . mysql_error()); 
      mysql_query("SET NAMES 'utf8'");
      if ( ! mysql_select_db("proj") ) { // 如果無法連上
		die("Can't select database");    
	  }
      $sql = "Update  book Set price = 100 where price > 100" ;
	  $result = mysql_query($sql, $conn);
      echo "執行 UPDATE 陳述式時，被影響的記錄數目:" . mysql_affected_rows($conn) . "<br>";
       
      mysql_close($conn);
    ?> 
  </body>
</html>
