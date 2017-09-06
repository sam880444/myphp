<?php
include 'demoapi.php'
session_start();

$lottery = rand


$member = new Member('001','sam','1');

$cart = new Cart($member);
$_SEAAION['cart']=$cart


$cart->addItem(pid: 'P001',qty:20);
$cart->addItem(pid: 'P001',qty:20);
$cart->addItem(pid: 'P001',qty:20);

$list=$cart->getBuylist();


echo "Member:{$member->getName()},Welcome<br>";
echo '<hr>';



foreach ($list as $k => $v){
    echo "{$k} : {$v}<br>";

}
