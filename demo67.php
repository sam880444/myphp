<?php
$mysqli = new mysqli('localhost','root','root','test3');
$rpp = 7
$page =1;
if (isset($_GET['page'])) $page = $_GET['page'];
$sql = "SELECT * FROM food where ";
$start = ($page-1)*$rpp;

$maxPage = ceil('$total/$rpp');


$prev = $page==1?1:$page-1;
$next = $page==$maxPage?$page:$page+1;

?>

?>
<a href"" >Prev</a> | <a href="">Next</a>
<table width="100%" border="1">
    <tr>
        <th>縣市</th>
        <th>城鎮</th>
        <th>名稱</th>
        <th>緯度</th>
        <th>經度</th>

    </tr>
    <?php
    while ($data = $result->fetch_object()){
        echo '<tr>';
        echo "<td>{$data->city}</td>";
        echo "<td>{$data->town}</td>";
        echo "<td>{$data->name}</td>";
        echo "<td>{$data->lat}</td>";
        echo "<td>{$data->lng}</td>";
        echo '</tr>';





    }

    ?>
</table>
