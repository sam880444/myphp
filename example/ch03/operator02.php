<!DOCTYPE html>
<html>
  <head>
     <meta charset='utf-8'>
     <title>ch03/operator02.php</title>
  </head>
  <body>
<?php              
	  $x = true ; 
	  $y = true ;
      echo '($x && $y) --->' . ($x && $y) ;
      echo   "<br>" ;	  	  	  	  
	  $x = false ; 
	  $y = true ;
      echo '($x && $y) --->' . ($x && $y) ;
      echo   "<br>" ;	  	  	  	  	  
      echo '($x || $y) --->' . ($x || $y) ;
      echo   "<br>" ;	
 ?>

</body> 
</html>