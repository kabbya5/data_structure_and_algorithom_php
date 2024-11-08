<?php 

function slidingWindowSum($arr, $k){
    if(count($arr) < $k){
        return [];
    }

    $window_sum = array_sum(array_slice($arr,0, $k));
    $result = [$window_sum];

    for($i = $k; $i < count($arr); $i++){
        $window_sum += $arr[$i] - $arr[$i-$k];
        $result[] = $window_sum;
    }

    return $result;
}

print_r(slidingWindowSum([1,2,3,4,5,6], 3));