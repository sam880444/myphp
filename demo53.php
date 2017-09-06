<?php
$mysqli = new mysqli('localhost','root','root','iii');

if($mysqli->connect_error){
    die($mysqli->connect_error);

}

//$mysqli->query("inser into member (account,passwd,realname) values('brad','123','Brad')";

$sql="select * from member";


$ret= $mysqli->query($sql);
var_dump($ret);

$result=$mysqli->($sql);
echo $result->num_rows;

$data = $result->fetch_object();
echo $data->account;



