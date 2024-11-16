<?php 

function sieveEratosthenes($n){
    $isPrime = array_fill(0, $n+1, true);
    $isPrime[0] = $isPrime[1] = false;

    for($i = 2; $i * $i <= $n; $i++){
        if($isPrime[$i]){
            for($j = $i*$i; $j <= $n; $j+= $i){
                $isPrime[$j] = false;
            }
        }
    }

    $primes = [];

    foreach($isPrime as $index => $prime){
        if($prime){
            $primes[] = $index;
        } 
    }

    return [$n => $primes];

}

$nums = [1,2,3,4,7,8,5,3,512,4,5,7];

$result = array_map('sieveEratosthenes', $nums);

foreach($result as $r){
    print_r($r); echo "<br>";
}