<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>建立資料庫</title>
  </head>
  <body>
    <?php
      error_reporting(E_ERROR | E_PARSE);
      $conn = mysql_connect("localhost", "root", "root") or die("建立資料連線失敗");
      if (mysql_query("Drop Database DBTest", $conn)) {
        echo "成功刪除指定之資料庫<br>";
      } else {
        echo "無法刪除指定之資料庫<br>";
      }
      
      if (mysql_query("Create Database DBTest", $conn)) {
        echo "成功建立指定之資料庫<br>";
      } else {
        echo "無法建立指定之資料庫<br>";
      }
      mysql_close($conn);
    ?> 
  </body>
</html>
