<?php

function quickSort(array $arr): array{
    if(count($arr) < 2){
        return $arr;
    }

    $pivot = $arr[0];
    $left = [];
    $right = [];

    for($i = 1; $i < count($arr); $i++){
        if($arr[$i] < $pivot){
            $left[] = $arr[$i];
        }else{
            $right[] = $arr[$i];
        }
    }

    return array_merge(quickSort($left), [$pivot], quickSort($right));
}

$array = [4,5,7,2,4,5,2,1,3];

print_r(quickSort($array));