<?php require_once('../connections/connPDO.php'); ?>
<?php
$sid = 0 ;        // 存放使用者於瀏覽器內所輸入的書籍流水編號
$bookID = -1;     // 存放由資料庫Book表格內讀出的書號
$title = "";      // 存放由資料庫Book表格內讀出的書名
$author = "";     // 存放由資料庫Book表格內讀出的作者
$price = "";      // 存放由資料庫Book表格內讀出的書籍價格 
$company = "";    // 存放由資料庫Book表格內讀出的出版社
$bookNo = "" ;    // 存放由資料庫Book表格內讀出的書號
if (isset($_POST['query_data'])) {
	if (isset($_POST['searchKey'])) {
		$sid = $_POST['searchKey'];
	}
	
	$sql = "SELECT  b.bookID, b.title, b.author, b.price, b.bookNo, bc.name, b.CoverImage from book b join bookcompany bc on b.companyID = bc.id where b.bookID = '" . $sid ."'" ;
	$pdoStmt = $pdo->query($sql);

	if ($pdoStmt->rowCount() == 0) {
		$bookID = -1;
		$title = "<font color='red'>查無此筆紀錄</font>";
		$author = "";
		$price = "";
		$company = "";
		$bookNo = "" ;
	} else {
		list($bookID, $title, $author, $price, $bookNo, $company, $data) = $pdoStmt->fetch(PDO::FETCH_NUM);
	}
}
?>
<html>
<head>
<meta charset='utf-8'>
<title>顯示商品資訊</title>
<style type="text/css">
#main {
	position: absolute;
	top: 110px;
	left: 120px;
}
#sub {
	position: absolute;
	top: 360px;
	left: 210px;
}
</style>
</head>
<body bgcolor='#e0e0f0'>
	<div id='main'>
		<table border='2' width="700" height="160" bgcolor='#ffffc0'>
			<tr>
				<td rowspan='6'>
					<table border='1' width="170" height="216">
						<tr>
							<td><?php 
							if ( $bookID != -1) {
								echo '<img width="160" height="200" src="getImage.php?bid=' . $bookID . '"/>';
							} else {
								echo ' ';
							}
							?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td width='540'>書名：<?php echo $title; ?></td>
			</tr>
			<tr>
				<td width='540'>作者：<?php echo $author; ?></td>
			</tr>
			<tr>
				<td width='540'>出版社：<?php echo $company; ?></td>
			</tr>
			<tr>
				<td width='540'>書號：<?php echo $bookNo; ?></td>
			</tr>
			<tr>
				<td width='540'>訂價(NT$)：<?php echo $price; ?></td>
			</tr>
		</table>
	</div>
	<div id='sub'>
		<form method='POST' Action='QueryBook.php'>
		
			請輸入流水號： <input type="text" name='searchKey' size='5' /> <br> 
			<input type="hidden" name='query_data'/> <br>
			<input type="submit" value='提交' />
		</form>
	</div>
</body>
</html>
