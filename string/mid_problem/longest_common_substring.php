<?php 

function longestCommonPrefix($str1, $str2){
    $len1 = strlen($str1);
    $len2 = strlen($str2);

    $maxLength = 0;
    $end = 0;

    $dp = array_fill(0, $len1 + 1, array_fill(0, $len2 + 1, 0));
    print_r($dp);
}

$str = "abcdef";
$str2 = "zabcf";

echo longestCommonPrefix($str, $str2);