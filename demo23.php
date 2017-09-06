<?php

function sayYa($count,$name='World'){
    for($i=0; $i<$count; $i++) {
        echo "Ya, {$name}<br>";
    }
}

function fx($x){
    return 2* $x +1;
}

function test()
{
    for ($i = 0; $i < func_num_args(); $i++) {
        echo fun_num_args();
    }

}


testv2(1,2,3,4,'Brad','iii',true);


sayYa(3);
$v =fx(x:3);
echo $v;
