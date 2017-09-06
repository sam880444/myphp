<?php
require("mysql2json5.php");
error_reporting(E_ERROR | E_PARSE);
mysql_connect("localhost", "root", "root");
mysql_select_db("proj");
mysql_query("SET NAMES 'utf8'");
$q = mysql_query("select * from Friends");

//echo '<pre>';
echo mysql2json5($q);
//echo '</pre>';
?>