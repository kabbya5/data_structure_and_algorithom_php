<?php 

function compression($str){
    $restult = "";
    $length = strlen($str);

    for($i = 0; $i < $length; $i++){
        $count = 1;

        while($i + 1 < $length && $str[$i] == $str[$i+1]){
            $count++;
            $i++;
        }

        $restult .= $str[$i] . $count;
    }

    return $restult;
}

$str = "aabcccccaaa";
echo compression($str); // "a2b1c5a3"