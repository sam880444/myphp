<!DOCTYPE html>
<html>
<!--SAPP03 PHP 羅毅 hw1-->
<head>
<meta charset='utf-8'>
<title>Insert title here</title>
<style>
table {
	border: 2px solid green;
	border-collapse: collapse;
	padding: 0px;
}

tr {
	border: 2px solid green;
}

.dd {
	border: 2px solid green;
	width: 2em;
}

.twon {
	background-color: #D1EEEE;
}

.twonp {
	background-color: #BCEE68;
}
</style>
<!-- apriori302@gmail.com -->
</head>
<body>
<p>1 計算1601到2000年(含)之間閏年的個數</p>
<?php
$ct=0;
for($i = 1601;$i<=2000; $i++){
	if(date("L",strtotime("$i-1-1"))){
		$ct++;
	}
}
echo ("counter=$ct<br>");
?>
<hr>
<p>2 2014年第三季開始顯示(A)10個連續的季度</p>
<?php
$j = 3;
$k = 2014;
for($i=0;$i<10;$i++){
	echo ($k."年第".$j."季<br />");
	$j++;
	if($j>4){
		$j = ($j%4);
		$k++;
	}

}
?>
<hr>
<p>(B)倒數10個連續的季度</p>
<?php
$j = 3;
$k = 2014;
for($i=0;$i<10;$i++){
	echo ($k."年第".$j."季<br />");
	$j--;
	if($j<1){
		$j =4;
		$k--;
	}

}
?>
<hr>
<p>3 九九乘法表(上下橫列不同背景顏色)</p>
<table border='1'>
<?php
for($i = 1;$i<10;$i++){
	if($i%2){
		echo ("<tr class = 'twon'>");
	}
	else{
		echo ("<tr class = 'twonp'>");
	}
	for($j=1;$j<10;$j++){
		echo("<td>{$j}x{$i}=".$j*$i."</td>");
	}
	echo("<tr />");
}
?>
</table>
<hr>
<p>4 產生-1到10的亂數直到亂數為-1 顯示所有亂數與總和</p>
<?php
$num;
$sum = 0;
$ct = 0;
echo "<table ><tr>";
do{
	$ct++;
	$num = rand(-1, 10);
	$sum += $num;
	if($ct<10){
		echo "<td class=\"dd\">".$num."</td>";
	}
	else{
		echo "<td class=\"dd\">".$num."</td></tr><tr>";
		$ct = 0;
	}
}
while($num!=-1);
echo "</tr>";
echo "</table>";
echo "<br>總和是".$sum;
?>
<hr>
<p>5 計算2147483647會從1970到何時</p>
<?php
function secInMon($year, $month){
	$total=0;
	switch($month){
		case 1:
		case 3:
		case 5:
		case 7:
		case 8:
		case 10:
		case 12:
			$total = 31*24*60*60;
			break;
		case 4:
		case 6:
		case 9:
		case 11:
			$total = 30*24*60*60;
			break;
		case 2:
			if(date("L",strtotime("$year-1-1"))){
				$total = 29*24*60*60;
			}
			else {
				$total = 28*24*60*60;
			}
			break;
		default:
			$total = -1;
			break;
	}
	return $total;
}

function secInYear($year){
	$sum=0;
	for($m=1;$m<=12;$m++){
		$sum +=secInMon($year,$m);
	}
	return $sum;
}
?>
<?php
$sec = 2147483647;
$year = 1970;
while($sec>secInYear($year)){
	$sec -= secInYear($year);
	$year++;
}
$month=1;
while($sec>secInMon($year, $month)){
	$sec -= secInMon($year, $month);
	$month++;
}
$day=1;
while($sec>24*60*60){
	$sec -= 24*60*60;
	$day++;
}
$hour=0;
while($sec>60*60){
	$sec -= 60*60;
	$hour++;
}
$min=0;
while($sec>60){
	$sec -= 60;
	$min++;
}
echo "{$year}年{$month}月{$day}日 {$hour}時{$min}分{$sec}秒<br>";
?>
</body>
</html>
