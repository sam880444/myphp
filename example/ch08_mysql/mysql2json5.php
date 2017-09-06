<?php
/*** shinder.lin@gmail.com
for PHP5
*/
function mysql2json5($sql) {
	if(is_string($sql)) {
    	$query = mysql_query($query) or die(mysql_error());
	} else {
		$query = $sql;
	}
           
    $ar = array();
    if($total = mysql_num_rows($query)) {
        while($row = mysql_fetch_assoc($query)) {
            $obj = array();
            foreach($row as $key => $value) {
				$obj[ $key ] = $value;
            }
			array_push($ar, $obj);
        }
        mysql_data_seek($query, 0); 
    }
	return json_encode($ar);
}
?>