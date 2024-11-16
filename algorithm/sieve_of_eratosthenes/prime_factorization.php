<?php 

class Solution{
    function primeFactorization($n){
        $factors = [];

        while($n % 2 == 0){
            $factors[] = 2;
            $n /= 2;
        }

        for($i = 3; $i * $i <= $n; $i += 2){
            while($n % $i == 0){
                $factors[] = $i;
                $n /= $i;
            }
        }

        if($n > 2){
            $factors[] = $n;
        }

        return $factors;
    }
}

$s = new Solution();
print_r($s->primeFactorization(27));