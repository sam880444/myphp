<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>建立資料連線</title>
  </head>
  <body>
    <?php
      error_reporting(E_ERROR | E_PARSE);
      $conn = mysql_connect("localhost", "root", "root")  or  die("無法建立連線");
      echo "成功建立連接";
    ?> 
  </body>
</html>
