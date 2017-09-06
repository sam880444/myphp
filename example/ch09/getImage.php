<?php require_once('../connections/connPDO.php'); ?>
<?php
// getImage.php
$sid = 0 ; 
if (!isset($_GET['bid'])) {
	  $sid = 1 ;
} else {
      $sid = $_GET['bid'];
}

$sql = "SELECT  bookID, CoverImage from book where bookID = '" . $sid ."'" ;  

$pdoStmt = $pdo->query($sql);
 
if ($pdoStmt->rowCount() == 0) {
	return;
}
		
list($bookID, $data) = $pdoStmt->fetch(PDO::FETCH_NUM);
if  ( $data != NULL )   {
   echo $data;
} 
?>