<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>EX 4-6</title>
</head>
    <body>
    
    <?php
    
$frr=array(
     array(1,5,4,10),
     array(2,3),
     array(100,10,20)
     );
     for($q=0; $q<count($frr);$q++){
     $sum=0;
     for($n=0 ;$n<count($frr[$q]);$n++){
     $sum += $frr[$q][$n];
     } 
    echo "$q==>$sum <br>";
     }
     
     echo"<hr>";
     for($v=0 ;$v<count($frr);$v++){
     $sum=0;
     for($w=0; $w<count($frr[0]);$w++){
     $sum += $frr[$v][$w];
    } 
    echo "$q==>$sum <br>";
     }
 
	?>
    </body>
    

</html>
