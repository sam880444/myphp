<?php require_once('Connections/conn.php'); ?>
<?php
  //  orders.php 程式功能: 
  //  1. 本程式顯示所有的訂單的資訊(訂單編號、訂購者、日期、訂單金額)，
  //     點選訂單編號，可以看到訂單的詳細內容，orderdetail.php會顯示
  //     單筆訂單的內容。 

$query_rs_orders = "SELECT * FROM orders ORDER BY O_Index DESC";
$pdoStmt = $pdo->query($query_rs_orders);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo SYSTEM_NAME; ?></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body  background="img/wireart.png">
<h3 align="center">訂單總覽</h3>
<hr />
<br />
<?php require_once('code/menu.php'); ?>

<p />
<table  class="table_color" width="600" border="2" align="center" cellpadding="2" cellspacing="2" >
  <tr class="title_font" height='30'>
    <td align="center"> 訂單編號</td>
    <td align="center">訂購者</td>
    <td align="center">日期</td>
    <td align="center">金額</td>
</tr>
  <?php while ($row_rs_orders = $pdoStmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr height='32'>
      <td><a href="orderdetail.php?OrderID=<?php echo $row_rs_orders['O_OrderID']; ?>"><?php echo $row_rs_orders['O_OrderID']; ?></a></td>
      <td><?php echo $row_rs_orders['O_CName']; ?></td>
      <td><?php echo $row_rs_orders['O_Date']; ?></td>
      <td align='right'><?php echo $row_rs_orders['O_Total']; ?></td>
    </tr>
    <?php }  ?>
                   
</table>
</body>
</html>