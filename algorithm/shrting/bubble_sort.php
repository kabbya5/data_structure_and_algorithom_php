<?php 

$nums = [1,20,3,5,7,2,7,9,1,2,16];
$nums_length  = count($nums);

for($i = 0; $i < $nums_length; $i++){
    for($j = 0; $j < $nums_length - 1; $j++){
        if($nums[$j] > $nums[$j+1]){
            $temp = $nums[$j];
            $nums[$j] = $nums[$j+1];
            $nums[$j+1] = $temp;
        }
    }
}

print_r($nums);
echo "<br>";
$strings = ['a', 'hell', 'j', 'm', 'bangladesh', 'php', 'js', 'nuxt', 'vue'];

$strings_length = count($strings);

for($i = 0; $i < $strings_length; $i++){
    for($j = 0; $j < $strings_length - 1; $j++){
        if($strings[$j] > $strings[$j+1]){
            $temp = $strings[$j];
            $strings[$j] = $strings[$j+1];
            $strings[$j+1] = $temp;
        }
    }
}

print_r($strings);