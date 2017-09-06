<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
  <title>關閉資料庫連線</title>
  </head>
  <body>
   
	<?php
	  echo "<h2 style='color:blue; text-align: center'>本程式說明如何關閉與資料庫的連線</h2>";
	  echo "<h4 style='color:brown; font-family: monospace; font-size: 22px'>\$pdo = new PDO('.....');<br>";
	  echo "....<br>";
	  echo "\$pdo = null;</h4>";
	  try {
	  	$pdo = new PDO('mysql:host=localhost; port=3306; dbname=proj; charset=utf8', 'root', 'root',
	  	  array(PDO::ATTR_EMULATE_PREPARES=>false, 
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION 
                )		
        );
	  	echo "建立連線(PDO)<br>";
	  } catch(PDOException $ex){
	  	echo "建立資料庫連線時發生錯誤，訊息:" . $ex->getMessage() . "<br>";
	  }
	  // 當一切作完就關閉連線，如果是Persistent connections，則不需要關閉。	  
	  $pdo = null;  
	  echo "建立連線後，成功地關閉連線(PDO)<br>";
	?>
	<hr />
	<hr />
	<?php
      error_reporting(E_ALL ^ E_DEPRECATED); // 通知PHP顯示除了Deprecated之外的所有訊息
      echo "<h3 style='color:red; text-align: center'>舊的做法(mysql_*)</h3>";
      $conn = mysql_connect("localhost", "root", "root") 
              or die("無法建立連接");
      echo "成功建立連線<br>";
      mysql_close($conn);
      echo "成功關閉連線<br>";
    ?> 
    
  </body>
</html>
