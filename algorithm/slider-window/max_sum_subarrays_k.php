<?php 

function maxSubarraySum($arr, $k){
    if($arr < $k){
        return [array_sum($arr), 0, array_keys($arr)];
    }

    $window_sum = array_sum(array_slice($arr,0, $k));
    $max_sum = $window_sum;
    $keys = [];

    for($i = $k; $i < count($arr); $i++){
        $window_sum += $arr[$i] - $arr[$i - $k];
        $temp = max($window_sum, $max_sum);

        if($max_sum < $temp){
            $max_sum = $temp;
            $keys = [$i -$k + 1, $i];
        }
    }

    return [$max_sum, $keys[0] , $keys[1]];
}

print_r(maxSubarraySum([2,2,7,2,4,6,5,6,8,2,42,1],3));