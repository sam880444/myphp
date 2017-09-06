<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>執行 UPDATE 陳述式時，被影響的記錄數目</title>
  </head>
  <body>
    <?php 
       	echo "<h2 style='color:blue; text-align: center'>說明執行UPDATE敘述時，如何得到被影響的記錄數</h2>";
     	echo "<h4 style='color:brown; font-family: monospace; font-size: 22px'>\$pdo = new PDO('......');<br>";
		echo "\$pdoStmt = \$pdo->query(\$sql);<br>";
		echo "\$num = \$pdoStmt->rowCount();<br>";
		echo "或;<br>";
		echo "\$num2 = \$pdo->exec(\$sql);<br>";
		echo "<br>";
		echo "</h4>";
		try {
        	$pdo = new PDO("mysql:host=localhost; port=3306; charset=utf8; dbname=proj",'root','root',
                array(PDO::ATTR_EMULATE_PREPARES=>false, 
                      PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)
        	);
	    //    $pdo->exec("set names utf8");
    	    $sql = "Update book Set price = price + 100 where price > 100";
        	$pdoStmt = $pdo->query($sql);
        	$num = $pdoStmt->rowCount();
        	echo "<p style='color:black; font-family: Verdana; font-size: 22px'>";
        	echo "方法一、利用\$pdoStmt->rowCount();<br>";
        	echo "執行UPDATE陳述式時，被影響的記錄數目(PDO):" . $num . "<br><br>";
	        // -------------------------------
    	    $num2 = $pdo->exec($sql);
        	echo "方法二、利用\$pdo->exec(\$sql);<br>";
        	echo "執行UPDATE陳述式時，被影響的記錄數目(PDO):" . $num2 . "<br></p>";
		} catch(PDOException $ex){
	    	echo "存取資料庫時發生錯誤，訊息:" . $ex->getMessage() . "<br>";
    	}
    ?>
     <hr/>
    <hr/>
    <?php
    echo "<h3 style='color:red; text-align: center'>舊的做法(mysql_*)</h3>";
      error_reporting(E_ALL ^ E_DEPRECATED); // 通知PHP顯示除了Deprecated之外的所有訊息
      $conn = mysql_connect("localhost", "root", "root") 
              or die("無法連上伺服器：" . mysql_error());
               
      mysql_query("SET NAMES 'utf8'");
      if ( ! mysql_select_db("proj") ) {
		  die("無法開啟資料庫proj");  
	  }
      $sql = "Update book Set price = price + 100 where price > 100" ;
	  $result = mysql_query($sql, $conn);
      echo "執行UPDATE陳述式時，被影響的記錄數目:" . mysql_affected_rows($conn) . "<br>";
       
      mysql_close($conn);
    ?> 
   
  </body>
</html>
