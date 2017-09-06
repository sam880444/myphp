<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>EX 4-1</title>
</head>
<body>
    
<?php
  function Test($num){
    $x=1;
    $evensum=0;
    $oddsum=0;
  }
    for ($x=1 ; $x<1001; $x++){
    	if($x%2 != 0){
    	$oddsum = $oddsum + $x;	  	    
    	}
    	else{
    	$evensum = $evensum + $x;	
    	 
    	}
        }
echo "The sum of enen Num from 1 to 1000 = ".$evensum.",<br> ";
        return;
	?>
    </body>
</html>