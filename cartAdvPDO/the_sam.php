<?php require_once('Connections/conn.php');
if (isset($_POST['kw'])) {
	$kw = $_POST['kw'];
	$query_all_records_count = "SELECT * FROM `book` WHERE `title` LIKE '%$kw%'" ;
} else {
	$query_all_records_count = "SELECT * FROM `book` " ;
}
	
	$result = $pdo->prepare($query_all_records_count);
	$result->execute();
	$rs  = $result->fetchAll(PDO::FETCH_ASSOC);
	$rows = array();
	foreach($rs as $row){
		$er = array();
		$er['bookID'] = $row['bookID'];
		$er['title'] = $row['title'];
		$er['price'] = $row['price'];
		$rows[] = $er;
	}
    echo json_encode($rows) ;
?>