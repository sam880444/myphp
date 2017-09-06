<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>開啟資料庫</title>
  </head>
  <body>
    <?php
      error_reporting(E_ERROR | E_PARSE);
      $conn = mysql_connect("localhost", "root", "root")
			  or die("無法建立連接<br><br>");
		
      $db_A = mysql_select_db("proj", $conn)
              or die ("無法開啟proj資料庫，原因:" . mysql_error($conn) . "<br>");
      echo "開啟proj資料庫<br>";
              
      $db_B = mysql_select_db("abcd", $conn)
              or die ("無法開啟abcd資料庫，原因:" . mysql_error($conn) . "<br>");                     
      echo "開啟abcd資料庫<br>";
      mysql_close($conn);
    ?> 
  </body>
</html>
