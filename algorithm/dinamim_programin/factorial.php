<?php 
function calculateFactorial($n){
    $factorials = [1];
    if($n <= 1){
        return 1;
    }
    for($i = 1; $i <= $n; $i++){
        $factorials[$i] = $factorials[$i -1] * $i;
    }

    return $factorials[$i- 1];
}

echo calculateFactorial(5);

function factorial($n){
    if($n <= 1){
        return 1;
    }

    return $n * factorial($n - 1); 
}

echo factorial(5);