<?php
$upload = $_FILES['upload'];

foreach ($upload['error']as $k => $v){
    if ($v == 0){
        copy("{$upload['tmp_name'][$k]}",
            "")

    }


}