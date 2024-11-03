<?php 

function rotateString($a, $b){
    if(strlen($a) !== strlen($b)) return false;

    $aa = $a.$a;

    return strpos($aa,$b) !== false;
}

var_dump(rotateString("abcde", "cdeab")); // Expected output: true
var_dump(rotateString("abcde", "abced")); // Expected output: false
var_dump(rotateString("abc", "abc"));     // Expected output: true
var_dump(rotateString("a", "a"));         // Expected output: true
var_dump(rotateString("abcd", "dabc"));   // Expected output: true
var_dump(rotateString("", ""));            // Expected output: true (both empty strings are considered equal)
var_dump(rotateString("abcd", "")); 