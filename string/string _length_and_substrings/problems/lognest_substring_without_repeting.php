<?php 

class Solution{
    public function findLongestSubstringWithoutRepetingCharecter($str){
        $str_map = [];

        $left = 0; 
        $max_len = 0;

        for ($right = 0; $right < strlen($str); $right++) {
           
            if (isset($str_map[$str[$right]])) {
                $left = max($str_map[$str[$right]] + 1, $left);
            }

            $str_map[$str[$right]] = $right;
            $max_len = max($max_len, $right - $left + 1);
        }

        echo $max_len;
    }
}

$s = new Solution();
$s->findLongestSubstringWithoutRepetingCharecter('abcabacbb');