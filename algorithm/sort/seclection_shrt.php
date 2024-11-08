<?php 
$nums = [1,20,3,5,7,2,7,9,1,2,16];
$nums_length  = count($nums);

for($i = 0; $i < $nums_length; $i++){
    $min = $i;
    $temp = $nums[$i];
    
    for($j = $i + 1; $i < $nums_length; $i++){
        if($nums[$j] < $nums[$i]){
            $min = $j;
        }
    }

    $nums[$i]  = $nums[$min];
    $nums[$j] = $temp;
}
print_r($nums);
echo "<br>";

$strings = ['a', 'hell', 'j', 'm', 'bangladesh', 'php', 'js', 'nuxt', 'vue'];
$strings_length = count($strings);

for($i = 0; $i < $strings_length; $i++){
    $min = $i;
    $temp = $strings[$i];
    
    for($j = $i + 1; $i < $strings_length; $i++){
        if($strings[$j] < $strings[$i]){
            $min = $j;
        }
    }

    $strings[$i]  = $strings[$min];
    $strings[$j] = $temp;
}
print_r($strings);