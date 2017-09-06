<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>Untitled Document</title>
</head>
<?php
$str='one|two|three|four';
$arr1 = explode('|', $str) ; 
print_r($arr1);
echo "<hr>";
$st='name=Mary&amt=100&pageNum_Recordset1=1&totalRows_Recordset1=4';
$params = explode("&", $st );
$arr2 = array();
  foreach ($params as $param) {
     if (stristr($param, "pageNum_Recordset1") == false && 
         stristr($param, "totalRows_Recordset1") == false) {
         array_push($arr2, $param);
     }
  }
print_r($arr2);  
?>
<body>
</body>
</html>
