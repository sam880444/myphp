<!DOCTYPE html>
<?php
$a = 500;   //
$b = 10;
function swapCallByValue($a, $b) {
	$a = $a + $b;
    $b = $a - $b;
    $a = $a - $a;
    echo "In swapCBV, a=$a, b=$b<br>"; 
}
function swapCallByReference(&$a, &$b) {
	$a = $a + $b;
    $b = $a - $b;
    $a = $a - $a; 
}


?>

<?php 
echo "2, ".$a . "<br>";
?>

<?php 
echo "3, ".$a . "<br>";
?>