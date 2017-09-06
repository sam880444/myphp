<?php

//step2. read from mysql
$connection = mysqli_connect("localhost","menuuser","pass","menu_db");
mysqli_query($connection,"set names 'utf8'");
//mysqli_set_charset($connection,"utf8");
if ( mysqli_connect_errno()){
    die("Can't establish connection from database, ".mysqli_connect_error());
}

$stmt = $connection->prepare("insert into menu (name,price) values(?,?)");
$stmt->bind_param('sd',$_POST["name"] , $_POST["price"]);//s 第一個name傳的值為string ,d 第二個price傳的值為數字
$stmt->execute();
$stmt->close();

mysqli_close($connection);

echo json_encode(array("status"=>"ok"));
?>