<?php
$json = file_get_contents('http://localhost/demo69.php');
$root = json_decode($json);
var_dump($root);

echo '<hr>';
foreach ($root as $data){
    echo "Member:{$member->name}({$member->id})<br>";

    $list = $data->list;
    foreach ($list as $p => $q){
        echo "($p) : {$q}<br>";
    }
 echo '<hr>';
}