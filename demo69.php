<?php

$a = array(1,2,3,4,5);
echo json_encode($a);
echo '<hr>';


$b = array (1,'name' => 'brad',3,'stage' =>4,5);
echo json_encode($b);
echo '<hr>';

class Member {
    var $name, $id;
}

class MyCart {
    var $list;
    var $member;
}


$m1 =new Member(); $m1->id = '001';$m1->name = 'Brad';
$cart1 = new Mycart(); $cart1->member = $m1;
$cart1->list = array('p001'=>12,'p004'=>3,'p008'=>13);

$m2 =new Member(); $m2->id = '002';$m2->name = 'Kevin';
$cart2 = new Mycart(); $cart2->member = $m2;
$cart2->list = array('p003'=>2,'p014'=>31);

$m3 =new Member(); $m3->id = '003';$m3->name = 'joye';
$cart3 = new Mycart(); $cart3->member = $m3;
$cart3->list = array('p011'=>123,'p024'=>13,'p108'=>3);

$c = array ($cart1,$cart2,$cart3);

echo json_encode($c);
echo '<hr>';