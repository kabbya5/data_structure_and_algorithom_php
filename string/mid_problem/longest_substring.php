<?php 

function longestSubstringWithoutRepeatingCharacters($str){

    $n = strlen($str);
    $seen = [];
    $l = 0;
    $max_length = 0;

    for($i = 0; $i < $n; $i++){
        $char = $str[$i];
        if(isset($seen[$char])){
            $l = $seen[$char] + 1;
        }
        $seen[$char]  = $i;
        $max_length = max($max_length, $i - $l + 1);
    }

    return $max_length;
}

$str = "abcabcbb";

echo longestSubstringWithoutRepeatingCharacters($str);