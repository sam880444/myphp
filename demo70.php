<?php
$json = file_get_contents('http://localhost/demo69.php');
$root = json_decode($json);
foreach ($root as $value){
    echo "{$value}<br>";
}
