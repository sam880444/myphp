<?php
include
session_start();

$cart= $_SESSION['cart'];

$name =$cart->getMember()->getName();

echo "Page2:{$name}<hr>";
