<!DOCTYPE html>
<?php
$a = 500;   //
$b = 10;
function test()
{
	// 靜態變數
	// 有效範圍: 只在本方法內有效，但是當方法結束後，
	// 它的值會被存，因此下ㄧ次再度呼叫方法時，它的值會是
	// 上次執行後的值。  
    static $a = 5;   
    echo $a . "<br>";
    $a++;
}

function Sum()
{
    global $a, $b;   

    $t = $a * $b;
    echo "t=$t<br>";
} 

echo "1, ".$a . "<br>";
?>

<?php 
echo "2, ".$a . "<br>";
?>

<?php 
echo "3, ".$a . "<br>";
?>