<?php require_once('Connections/conn.php'); ?>
<?php
  // orderdetail.php 程式功能: 
  //  1. 本程式顯示每筆訂單的詳細內容，包括客戶資料與訂購的商品資料
$orderId = "-1";  
if (isset($_GET['OrderID'])) {
   $orderId = $_GET['OrderID'];
}
// 讀取訂單主擋的SQL敘述
$queryOrder = "SELECT * FROM orders WHERE O_OrderID = ?";
$pdoStmt = $pdo->prepare($queryOrder);
$pdoStmt->bindValue(1, $orderId);
$pdoStmt->execute();
$row_order = $pdoStmt->fetch(PDO::FETCH_ASSOC);
//------------------------------
// 讀取訂單明細擋的SQL敘述
$queryDetail = "SELECT * FROM detail WHERE D_OrderID = ?";
$pdoStmt2 = $pdo->prepare($queryDetail);
$pdoStmt2->bindValue(1, $orderId);
$pdoStmt2->execute();
$allRow_Detail = $pdoStmt2->fetchAll(PDO::FETCH_ASSOC);	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SYSTEM_NAME; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body  background="img/wireart.png">
<h3 align="center">購物車</h3>
<hr />
<br />
 <?php require_once('code/menu.php'); ?>
<p/>
<table  class="table_color" width="640" border="2" align="center" cellpadding="2" cellspacing="2" >
   <tr >
      <td align='left' height='40' colspan="5">
        <table class="table_color" width="636" border="0">
        <tr>
      <td align='left' height='40' >訂單編號：<font color='RED'><?php echo $row_order['O_OrderID']; ?></font></td>
      <td align='right' height='40'>日期：<font color='RED'><?php echo $row_order['O_Date']; ?></font></td>
      </tr>     
      </table>
      </td>
   </tr>
   <tr class="title_font">
      <td height='32' align="center">商品編號</td>
      <td align="center">商品名稱</td>
      <td align="center">商品單價</td>
      <td align="center">商品數量</td>
      <td align="center">小計</td>
   </tr>
   <?php 
      foreach ($allRow_Detail as $an_order_item ) { ?> 
         <tr >
           <td height='30' ><?php echo $an_order_item['D_PNo']; ?></td>
           <td height='30' ><?php echo $an_order_item['D_PName']; ?></td>
           <td align='right'><?php echo number_format($an_order_item['D_PPrice']); ?></td>
           <td align='right'><?php echo number_format($an_order_item['D_PQuantity']); ?></td>
           <td align='right'><?php echo number_format($an_order_item['D_ItemTotal']); ?></td>
         </tr>
   <?php } ?>
                     
   <tr>
       <td  height='30' colspan="5">&nbsp;</td>
   </tr>
   <tr >
       <td height='30' colspan='5' align='right' >總計：
           <font color='red'><?php echo number_format($row_order['O_Total']); ?></font>
       </td>
    </tr>
    <tr>
       <td colspan="5">
       <table width='636' border='1' class="customer_color" >
          <tr >
             <td height='24' width='100' class="customer_color" align='right'>顧客姓名</td>
             <td ><?php echo $row_order['O_CName']; ?></td>
          </tr>
          <tr >
              <td height='24' width='100' class="customer_color" align='right'>
                 顧客電話
              </td>
              <td >
	             <?php echo $row_order['O_CPhone']; ?>
              </td>
          </tr>
          <tr >
              <td width='100' height='24' class="customer_color" align='right'>
                 信箱
              </td>
              <td >
			     <?php echo $row_order['O_CEmail']; ?>
              </td>
          </tr>
          <tr >
             <td width='100' class="customer_color" align='right'>收件地址</td>
             <td ><?php echo $row_order['O_CAddr']; ?></td>
          </tr>
       </table>
    </td>
    </tr>
</table>
<p/>
<center>
  <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">回前頁</a>
 </center>
</body>
</html>

