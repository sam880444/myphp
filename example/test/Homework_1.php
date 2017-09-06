<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<title>Insert title here</title>
</head>
<body>
<?php

echo '<table border="1" >';
for($i=1;$i<=9;$i++)
{
	echo "<tr>";
	for ($j=1;$j<=9;$j++)
	{
		if($i%2==0){
			echo "<td bgcolor='#B3EEFF' >$j x $i = ".$i*$j."</td>";
		}else {
			echo "<td bgcolor='#C9FFB3' >$j x $i = ".$i*$j."</td>";
		}
	}
	echo "</tr>";
}
echo "</table>"
		
	?>
</body>
</html>