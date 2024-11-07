<?php 
function fibonacci($n){
    $array = [0,1];
    echo $array[0]. "\n";
    echo $array[1] . "\n";
    for($i = 2; $i <= $n; $i++){
        $array[$i] = $array[$i-2] + $array[$i - 1];
        echo $array[$i] . "\n";
    }

}

fibonacci(8);