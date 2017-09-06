<?php

if(!isset($_REQUEST['account']))
    header(string:"Location:brad19.php?error=2");

$account=$_REQUEST['account'];
echo $account;