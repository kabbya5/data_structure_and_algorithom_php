<?php 
function longestCommonPrefix($strs) {
    $strs_len = count($strs);
    
    if($strs_len <= 0) return " ";

    $prefix = $strs[0];
    for($i = 0; $i < $strs_len; $i++){
        while(strpos($strs[$i],$prefix) !== 0){
            $prefix = substr($prefix, 0, -1);
            if($prefix == ''){
                return " ";
            }
        }
    }

    return $prefix;
}

$strs = ["flower","flow","flight"];

echo longestCommonPrefix($strs);