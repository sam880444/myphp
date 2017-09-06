<?php

$mysqli = new mysqli('localhost','root','root','iii');
$account = $_GET['account'];
$sql = "SELECT"