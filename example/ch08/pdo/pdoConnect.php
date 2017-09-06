<!DOCTYPE html>
<?php

$db = new PDO('mysql:host=localhost;dbname=proj;charset=utf8', 'root', 'root');
if ($db){
	echo "Connect";
} else {
	echo "No Connect";
}
?>