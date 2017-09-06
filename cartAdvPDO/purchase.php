<?php session_start(); ?>
<?php require_once('Connections/conn.php'); ?>
<?php
// purchase.php 程式功能:
// 1.當使用者確定購買所訂購的商品後，本程式顯示輸入客戶基本資料的畫面
//   讓使用者輸入資本資料
// 2.當使用者按下Submit按鈕後，資料會送交	到本程式，由本程式寫入orders表格。

$editFormAction = $_SERVER['PHP_SELF'];

if (isset($_SERVER['QUERY_STRING'])) {
	$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$name = "";
$phone = "";
$addr = "";
$email = "";
$total = "";
$nameError = "";	// 存放未輸入姓名時的錯誤訊息
$phoneError = "";	// 存放未輸入電話時的錯誤訊息
$addrError = "";	// 存放未輸入地址時的錯誤訊息
$hasError = false;
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	// 檢查輸入的客戶基本資料
	$name = trim($_POST['O_CName']);
	$phone = trim($_POST['O_CPhone']);
	$addr = trim($_POST['O_CAddr']);
	$email = trim($_POST['O_CEmail']);
	$total = trim($_POST['O_Total']);
	if ( empty($name) ){
		$nameError = "姓名欄不能是空白";
		$hasError = true;
	}
	if ( empty($phone) ){
		$phoneError = "電話欄不能是空白";
		$hasError = true;
	}
	if ( empty($addr) ){
		$addrError = "地址欄不能是空白";
		$hasError = true;
	}
	if (!$hasError) {
		// 確定訂單編號
		while (true){
			$OrderID = date("YmdHis") . substr(md5(uniqid(rand())), 0, 5);
			$selectSQL = "SELECT count(*) FROM Orders WHERE  O_OrderID = '$OrderID' " ;
			$pdoStmt = $pdo->prepare($selectSQL);
			$pdoStmt->execute();
			$num = $pdoStmt->fetchColumn();
			if ($num == 0){
				break;
			}
		}
		$_SESSION['DD'] = $OrderID ;
		try {
			// 啟動交易
			$pdo->beginTransaction();
			// 寫入訂單主檔
			$insertSQL = "INSERT INTO orders (O_OrderID, O_CName, O_CAddr, O_CPhone, O_CEmail, O_Total) VALUES " .
					"(?, ?, ?, ?, ?, ?)" ;
			$pdoStmt = $pdo->prepare($insertSQL);
			$pdoStmt->bindValue(1, $OrderID, PDO::PARAM_STR);
			$pdoStmt->bindValue(2, $name, PDO::PARAM_STR);
			$pdoStmt->bindValue(3, $addr, PDO::PARAM_STR);
			$pdoStmt->bindValue(4, $phone, PDO::PARAM_STR);
			$pdoStmt->bindValue(5, $email, PDO::PARAM_STR);
			$pdoStmt->bindValue(6, $total, PDO::PARAM_INT);
			$pdoStmt->execute();
			$num = $pdoStmt->rowCount();
			// 寫入訂單明細檔
			foreach($_SESSION['Cart'] as $i => $val){
				$D_PNo 			= $_SESSION['Cart'][$i];
				$D_PName		= $_SESSION['Name'][$i];
				$D_PPrice		= $_SESSION['Price'][$i];
				$D_PQuantity	= $_SESSION['Quantity'][$i];
				$D_PitemTotal	= $_SESSION['itemTotal'][$i];

				$insertSQL = "INSERT INTO detail (D_OrderID, D_PNo, D_PName, D_PPrice, D_PQuantity, D_ItemTotal) VALUES  " .
						"(?, ?, ?, ?, ?, ?) ";
				$pdoStmt = $pdo->prepare($insertSQL);
				$pdoStmt->bindValue(1, $OrderID, PDO::PARAM_STR);
				$pdoStmt->bindValue(2, $D_PNo, PDO::PARAM_STR);
				$pdoStmt->bindValue(3, $D_PName, PDO::PARAM_STR);
				$pdoStmt->bindValue(4, $D_PPrice, PDO::PARAM_STR);
				$pdoStmt->bindValue(5, $D_PQuantity, PDO::PARAM_STR);
				$pdoStmt->bindValue(6, $D_PitemTotal, PDO::PARAM_INT);
					
				$pdoStmt->execute();
				$num = $pdoStmt->rowCount();
			}
			$pdo->commit();
			$_SESSION['InsertMessage'] = '訂單新增成功<br>';
		} catch(PDOException $ex){
			echo "存取資料庫疵發生錯誤，訊息:" . $ex->getMessage() . "<br>";
			echo "行號:" . $ex->getLine() . "<br>";
			$pdo->rollback();
			$_SESSION['InsertMessage'] = '資料異動發生錯誤，執行rollbck() <br>';
		}		
		//session_destroy();   // session_destroy(): 刪除$_SESSION陣列內的所有元素
		if (isset($_SESSION['Cart'])) {
			// ...
			unset($_SESSION['Cart']);
			unset($_SESSION['Name']);
			unset($_SESSION['Price']);
			unset($_SESSION['Quantity']);
			unset($_SESSION['itemTotal']);
		}
		$insertGoTo = "list.php";
		header(sprintf("Location: %s", $insertGoTo));
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SYSTEM_NAME; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body background="img/wireart.png">
	<h3 align="center">購物車</h3>
	<hr />
	<br />
	<?php require_once('code/menu.php'); ?>
	<p />
	<form action="<?php echo $editFormAction; ?>" id="form1" name="form1"
		method="post">

		<table class="table_color" width="700" border="2" align="center"
			cellpadding="2" cellspacing="2">
			<tr height='32'>
				<td colspan='2' align="left" class="title_font">請輸入下列資料:</td>
			</tr>
			<tr>
				<td width="90" align="right" class="title_font">姓 名</td>
				<td><input name="O_CName" type="text" id="O_CName"
					value="<?php echo $name ;?>" /> <font color='red' size='-2'><?php echo $nameError ;?>
				</font>
				</td>
			</tr>
			<tr height='32'>
				<td width="90" align="right" class="title_font">電 話</td>
				<td><input name="O_CPhone" type="text" id="O_CPhone"
					value="<?php echo $phone ;?>" /> <font color='red' size='-2'><?php echo $phoneError ;?>
				</font>
				</td>
			</tr>
			<tr height='32'>
				<td width="90" align="right" class="title_font">Email</td>
				<td><input name="O_CEmail" type="text" id="O_CEmail"
					value="<?php echo $email ;?>" />
				</td>
			</tr>
			<tr height='32'>
				<td width="90" align="right" class="title_font">住 址</td>
				<td><input name="O_CAddr" type="text" id="O_CAddr" size="60"
					value="<?php echo $addr	 ;?>" /> <font color='red' size='-2'><?php echo $addrError ;?>
				</font> <input name="O_OrderID" type="hidden" id="O_OrderID"
					value="<?php echo $_SESSION['OrderID']; ?>" /> <input
					name="O_Total" type="hidden" id="O_Total"
					value="<?php echo $_SESSION['Total']; ?>" />
				</td>
			</tr>
			<tr height='32'>

				<td colspan="2"><div align="center">
						<input type="submit" name="Submit" value="送出" />
					</div></td>
			</tr>
		</table>
		<input type="hidden" name="MM_insert" value="form1" />
	</form>
</body>
</html>
