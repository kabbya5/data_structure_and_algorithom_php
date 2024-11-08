<?php 
$nums = [1,20,3,5,7,2,7,9,1,2,16];
$nums_length  = count($nums);
$strings = ['a', 'hell', 'j', 'm', 'bangladesh', 'php', 'js', 'nuxt', 'vue'];
$strings_length = count($strings);

function mergeSort($nums){
    if(count($nums) === 1){
        return $nums;
    }

    $length = count($nums);
    $middle = floor($length/ 2);
    $left = array_slice($nums,0, $middle);
    $right = array_slice($nums, $middle, $length);

    return merge(
        mergeSort($left),
        mergeSort($right),
    );
}

function merge($left,$right){
    $result = [];
    $leftIndex = 0;
    $rightIndex = 0;

    while($leftIndex < count($left) && $rightIndex < count($right)){
        if($left[$leftIndex] < $right[$rightIndex]){
            $result[]= $left[$leftIndex];
            $leftIndex++;
        }else{
            $result[]= $right[$rightIndex];
            $rightIndex++;
        }
    }

    while ($leftIndex < count($left)) {
        $result[] = $left[$leftIndex];
        $leftIndex++;
    }

    while ($rightIndex < count($right)) {
        $result[] = $right[$rightIndex];
        $rightIndex++;
    }

    return $result;

}

print_r(mergeSort($nums));
// print_r(mergeSort($strings));