
<?php 

function reverseString($str){
    // echo strrev($str);
    $n = count($str);
    $l = 0; 
    $r = $n - 1;
    while($l < $r){
        $temp = $str[$l];
        $str[$l] = $str[$r];
        $str[$r] = $temp;
        $l++;
        $r++;
    }

    return $str;
}

$str = "hello";
$str2 = "listen";

echo reverseString($str) . "<br>";
echo reverseString($str2) . "<br>";
