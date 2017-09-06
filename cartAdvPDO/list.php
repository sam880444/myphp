<?php require_once('Connections/conn.php');
// list.php
ob_start();
session_start(); 
error_reporting(E_ALL ^ E_DEPRECATED); // 通知PHP顯示除了Deprecated之外的所有訊息
// 程式功能: 
//  1. 本程式顯示本網站銷售的所有商品，商品資訊分頁顯示，每頁顯示三筆商品。使用者
//     可以按下『第一頁』、『前一頁』、『下一頁』與『最後頁』來分頁瀏覽商品。
//  2. 當使用者要購買某項商品時，可直接按下『商品名稱』(即書名)，便可看到該商品
//     更詳細的資料(由product.php來顯示)，之後可按下『加入購物車』來購買該項商品。
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SYSTEM_NAME; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#paging {
	position: absolute;
	left: 120px;
	top: 450px;
}

#pfirst {
	position: relative;
	left: 2px;
	top: 2px;
}

#pprev {
	position: relative;
	left: 2px;
	top: 2px;
}

#pnext {
	position: relative;
	left: 2px;
	top: 2px;
}

#plast {
	position: relative;
	left: 2px;
	top: 2px;
}
</style>
</head>

<?php
// $_SERVER["PHP_SELF"] : 傳回本程式在伺服器內的路徑
$currentPage = $_SERVER["PHP_SELF"];
//  echo  $currentPage ."<BR>" ;  印出 /cart/list.php

$maxRows = 3;    // 每頁顯示多少筆記錄
$pageNum = 0;    // 將要顯示哪一頁的資料(0表示第一頁)

// 如果本程式有收到瀏覽器送來的pageNum變數(將要顯示哪一頁的資料)
if (isset($_GET['pageNum'])) {
	$pageNum = $_GET['pageNum'];
} 
else if (isset($_SESSION['pageNum'])) {
	$pageNum = $_SESSION['pageNum'];
}
 else if (isset($_COOKIE['pageNum'])) {
	$pageNum = $_COOKIE['pageNum'];
}
$startRow = $pageNum * $maxRows;     // 算出將要顯示的分頁是由哪一筆開始(0表示第一筆)

$query_all_records_count = "SELECT count(*) FROM book" ;

// 如果瀏覽器有透過GET方法傳回totalRows變數(內含查詢結果的總紀錄筆數)
if (isset($_GET['totalRows'])) {
	$totalRows = $_GET['totalRows'];
} else {
	// 否則到資料庫讀取查詢結果的結果集:
    $result = $pdo->prepare($query_all_records_count);
    $result->execute();
    // 再取出查詢結果內的紀錄筆數，放到變數 $totalRows內
    $totalRows  = $result->fetchColumn();
}

// 計算有幾頁(Page) 0 表示有1頁，1 表示有2頁，
// 例如：有15筆記錄，每頁3筆, 總共5頁($totalPages的值為4)
$totalPages = ceil($totalRows / $maxRows) - 1;  //

$queryString_Recordset1 = "&totalRows=$totalRows";

?>

<body background="img/wireart.png">
<h3 align="center"><?php echo SYSTEM_NAME; ?></h3>
<hr />
<br />
<?php require_once('code/menu.php'); ?>
<!-- code/menu.php的內容如下
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="125" ><a href="list.php">瀏覽商品</a> </td>
    <td width="125" > <a href="showcart.php">檢視購物車</a></td>
    <td width="125" > <a href="cls.php">清空購物車</a> </td>
    <td width="125" > <a href="orders.php">檢視所有訂單</a> </td>
  </tr>
</table>
 -->
<p />
<table class="table_color" width="720" border="2" align="center"
	cellpadding="2" cellspacing="2" >
	<tr height='32' class="title_font">
		<td width="60">
		<div align="center">流水號</div>
		</td>
		<td width="220">
		<div align="center">書名</div>
		</td>
		<td width="100">
		<div align="center">作者</div>
		</td>
		<td width="42">
		<div align="center">單價</div>
		</td>
		<td width="80">
		<div align="center">出版社</div>
		</td>
		<td width="64">
		<div align="center">圖片</div>
		</td>
		<td width="80">
		<div align="center">書號</div>
		</td>
	</tr>
	<?php
	$query_all_records = "SELECT b.*, bc.name  FROM book b join bookcompany bc on b.companyID = bc.id";
	$query_limit_records = $query_all_records . " LIMIT " . $startRow . "," . $maxRows;

	//由資料庫中讀取符合條件的一頁記錄(注意，不是所有紀錄)，放入變數$pdoStmt內
	$pdoStmt = $pdo->prepare($query_limit_records);
	$pdoStmt->execute();
	//$pdoStmt->fetch(PDO::FETCH_ASSOC);
	// 從由結果中取出所有記錄，然後轉換為二維陣列傳回，其內的ㄧ維陣列都是關聯式陣列(識別資訊是字串)。
	$arr2D = $pdoStmt->fetchAll(PDO::FETCH_ASSOC);
	foreach($arr2D as $row){ ?>
	<tr>
		<td align='center'><?php echo $row['bookID']; ?></td>
		<td><a
			href="product.php?bookID=<?php echo $row['bookID']; ?>"><?php echo $row['title']; ?></a></td>
		<td><?php echo $row['author']; ?></td>
		<td align='right'><?php echo $row['price']; ?>&nbsp;</td>
		<td><?php echo substr($row['name'], 0, 12); ?></td>
		<td><img
			src="bookMaintain/BookCoverImage.php?searchKey=<?php echo $row['bookID']; ?>"
			width="48" height="64" alt="" /></td>
		<td><?php echo $row['bookNo']; ?></td>
	</tr>
	<?php
	}  // foreach迴圈到此結束
	?>
</table>
<p>
<div id="paging"><!-- 
    程式準備判斷是否要在回應給瀏覽器的HTML文件中，送出『第一頁』、
    『前一頁』、『下一頁』與『最後頁』的超連結，以便提供分頁的功能
    來瀏覽商品。
    注意：程式都已經替這些超連結算好『前一頁』、『下一頁』是哪一頁，
    存放在超連結內的?pageNum=xxx。
-->
<table border="0">
	<tr>
		<td width='76'><?php if ($pageNum > 0) { // 如果目前顯示的不是第一頁 ?>
		<div id="pfirst"><!-- 第一頁 --> <a
			href="<?php echo("$currentPage?pageNum=0$queryString_Recordset1"); ?>">第一頁</a>
		</div>
		<?php }  ?></td>

		<td width='76'><?php if ($pageNum > 0) { // 如果目前顯示的不是第一頁  ?>
		<div id="pprev"><!-- 前一頁 --> <a
			href="<?php
                     $pm =  $pageNum - 1;  // $pm 最小為 0
                     echo("$currentPage?pageNum=$pm$queryString_Recordset1"); 
                  ?>">前一頁</a></div>
                  <?php }  ?></td>
                  
                  
       <td width='140'>
		<div><!-- 第  頁/共 頁 --> <?php 
		$pNo = $pageNum+1;
		$totPage = $totalPages+1;
		echo "第  $pNo 頁 / 共 $totPage 頁"; ?></div>
		</td>                  
		<td width='76'>
		<div id="pnext"><!-- 下一頁 --> <?php if ($pageNum < $totalPages) { // 如果目前顯示的不是最後一頁 ?>

		<a
			href="<?php 
                    $pm =  $pageNum + 1;  // $pm 最大為 $totalPages           
                    echo ("$currentPage?pageNum=$pm$queryString_Recordset1"); 
                  ?>">下一頁</a> <?php } // 如果目前顯示的不是最後一頁 ?></div>
		</td>

		<td width='76'><?php if ($pageNum < $totalPages) { // 如果目前顯示的不是最後一頁 ?>
		<div id="plast"><!-- 最後頁 --> <a
			href="<?php 
               echo ("$currentPage?pageNum=$totalPages$queryString_Recordset1"); ?>">最後頁</a>
		</div>
		<?php } // 如果目前顯示的不是最後一頁 ?></td>
	</tr>
</table>
</div>

<div id="message">
    <?php 
        if (isset($_SESSION['InsertMessage'])) {
			echo  $_SESSION['InsertMessage'];
			unset($_SESSION['InsertMessage']);				
		} 
    ?>
		  
</div>
</body>
</html>
<?php
	setcookie("pageNum", $pageNum, time() + 30*24*60*60);
	$_SESSION['pageNum'] = $pageNum;
?>
