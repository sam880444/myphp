<?php
if (!isset($_GET['editid']))header("Location:brad55.php");

$editid = $_GET['editid'];
$sql = "SELECT * FROM member WHERE id={$editid}";

$mysqli = new mysqli('localhost','root','root','iii');

$id = $_GET['id'];
$account = $_GET['account'];
$passwd = password_hash($_GET['passwd'],'PASSWORD_DEFAULT');
$realname = $_GET['realname'];

$sql = "UPDATE member SET account='{account}',passwd='{$passwd}'"
