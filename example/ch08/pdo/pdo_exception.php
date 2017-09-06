<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <title>建立資料連線</title>
  </head>
  <body>
    
    
    <?php
try {
	$db = new PDO('mysql:host=localhost;dbname=proj;charset=utf8', 
		  'root', 'root',
		   array(PDO::ATTR_EMULATE_PREPARES => false, 
    		     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    		 );
	
    $db->query('hi,,...'); //invalid query!
} catch(PDOException $ex) {
    echo "發生資料庫存取錯誤:" . $ex->getMessage() ; 
}
?>
    
    
  </body>
</html>
