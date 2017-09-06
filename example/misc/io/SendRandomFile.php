<!DOCTYPE html>
<?php
$x = $_SERVER["DOCUMENT_ROOT"] . "/test/testA.jpg" ;
echo "<p>files: $x </p>";
$files = glob($_SERVER["DOCUMENT_ROOT"]."/test/*.*");
foreach($files as $k =>$v){
   echo "<p>files: $k </p>";
}
$dir = dirname(__FILE__);
echo "<p>Full path to this dir: " . $dir . "</p>";
echo "<p>Full path to a .htpasswd file in this dir: " . $dir . "/.htpasswd" . "</p>";

// echo basename("bookA.jpg");
// $myfile = fopen("bookA.jpg", "r") or die("Unable to open file!");
// echo fread($myfile,filesize("webdictionary.txt"));
// fclose($myfile);
?>
</body>
</html>
