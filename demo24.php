<?php
   $fp= fopen("./dir1/test.csv",'r');

   $line = fgets($fp);
   $line = fgets($fp);
   $line = iconv("BIG5",'');
   $row = explode(',',$line);
   foreach ($row as $v){

       echo "{$v}<br>";
   }





