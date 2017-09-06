<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
  <title>關閉資料連線</title>
  </head>
  <body>
    <?php
      error_reporting(E_ERROR | E_PARSE);
      $conn = mysql_connect("localhost", "root", "root") or die("無法建立連接");
      echo "成功建立連線<br>";
      mysql_close($conn);
      echo "成功關閉連線<br>";
    ?> 
  </body>
</html>
