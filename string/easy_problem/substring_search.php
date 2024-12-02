<?php 

function substringSearch($str, $needle ){
    $index = strpos($str, $needle);
    
    if(str_contains($str, $needle)){
        return "Find";
    }
}

$str = "hello";
$needle = 'll';

echo substringSearch($str, $needle);