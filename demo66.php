<?php


$json = file_get_contents("http://data.coa.gov.tw/Service/OpenData/ODwsv/ODwsvTravelFood.aspx");

$root = json_decode($json);

$mysqli = new mysqli('localhost','root','root','iii');

foreach ($root as $data){

}

    foreach($root as $key => $value) {
        echo "{$value->key1} : {$value->key2}";
        echo "<hr>";
    }
