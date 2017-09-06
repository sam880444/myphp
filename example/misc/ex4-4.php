<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>Insert title here</title>
</head>
    <body>
    <?php
    
    $lottery = array();
     for($x=1;$x<=5;$x++){
     	//generate a random number
     	$a = rand(1,39);
     	
     	//check if exist in lottery
     	$exist = 0;
     	for ($n = 0; $n < count($lottery); $n++) {
     		if($a == $lottery[$n])
     		{
     			$exist = 1;
     			$x -= 1;
     			break;
     		}
     	}
     	
     	//if not exist, add into lottery;
     	if($exist == 0){
     		$lottery[count($lottery)]= $a;
     	echo '$lottery['.$a.'] ='.$lottery[$a];
     	}
   
     }

	?>
    </body>

</html>