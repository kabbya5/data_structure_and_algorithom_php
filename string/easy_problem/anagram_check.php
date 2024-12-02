<?php 

function anagramCheck($str1,$str2){
    $str1_frequency = array_count_values(str_split($str1));
    $str2_frequency = array_count_values(str_split($str2));
    
   sort($str1_frequency);
   sort($str2_frequency);

   if($str1_frequency == $str2_frequency){
        return true;
   }else{
        return false;
   }
}

$str1 = 'listen';
$str2 = 'silent';

echo anagramCheck($str1, $str2);