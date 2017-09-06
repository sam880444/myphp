<!DOCTYPE html>
<!-- 正數及倒數2014第三季起十季 -->
<html>
<head>
<meta charset='utf-8'>
<title>Insert title here</title>
</head>
<body>
<?php
class YearAndSeason {
	public $year;
	public $season;

	function __construct(){
		$this->year=date("Y");
		$this->season=ceil(date("m")/3);
	}
	
	function setYearAndSeason($y,$s) {
		if ($s>4) {
			for ($i = $s; $i > 4; $i-=4) {
				$s-=4;
				$y++;
			}
		}else if ($s<1) {
			for ($i = $s; $i < 1; $i+=4) {
				$s+=4;
				$y--;
			}
		}
		$this->year=$y;
		$this->season=$s;
	}
	
	function forward($number) {
		$this->season+=$number;
		$this->setYearAndSeason($this->year, $this->season);
	}
}


$ys1=new YearAndSeason();
$ys1->setYearAndSeason(2014,3);
echo "正數十季：<br>";
for ($j = 1; $j <= 10; $j++) {
	$ys1->forward(1);
	echo $ys1->year . "年第" . $ys1->season . "季<br>";
}

$ys2=new YearAndSeason();
$ys2->setYearAndSeason(2014,3);
echo "<br>倒數十季：<br>";
for ($j = 1; $j <= 10; $j++) {
	$ys2->forward(-1);
	echo $ys2->year . "年第" . $ys2->season . "季<br>";
}

?>
</body>
</html>
