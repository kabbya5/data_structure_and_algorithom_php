<?php 

function findLargestAndSecoundLargest($arr){
    $largest = $secoundLargest = PHP_INT_MIN;

    foreach($arr as $num){
        if($num > $largest){
            $secoundLargest = $largest;
            $largest = $num;
        }elseif($num > $secoundLargest && $num != $secoundLargest){
            $largest = $num;
        }
    }

    return $largest . ' '. $secoundLargest;
}

$arr = [1,2,3,4,5,6,2,11,2,4];

echo findLargestAndSecoundLargest($arr);