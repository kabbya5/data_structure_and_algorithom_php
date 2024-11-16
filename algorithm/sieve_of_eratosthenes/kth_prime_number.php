<?php 

class Solution{

    function kthPrimeNumber($k){
        if($k <= 0) return - 1;
        $upperBound = $k > 6 ? (int)($k * log($k) + $k * log(log($k))) : 15;

        $sieve = array_fill(0, $upperBound + 1, true);
        $sieve[0] = $sieve[1] = false;

        for($i = 2; $i * $i <= $upperBound; $i++){
            if($sieve[$i]){
                for($j = $i * $i; $j <= $upperBound; $j+=$i){
                    $sieve[$j] = false;
                }
            }
        }

        $primes = [];
        for ($i = 2; $i <= $upperBound; $i++) {
            if ($sieve[$i]) {
                $primes[] = $i;
            }

            if (count($primes) === $k) {
                return $primes[$k-1];
            }
        }
    }
}

$s = new Solution();
echo $s->kthPrimeNumber(10);