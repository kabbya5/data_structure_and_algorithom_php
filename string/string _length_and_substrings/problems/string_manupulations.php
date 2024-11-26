<?php 
interface StringManupulation{
    function palindrome(array $strs):array;

    function firstNonRepeatingCharacter(string $str):string;

    public function areAnagrams(string $str1, string $str2): bool;
}

class Solution implements StringManupulation{
    public function palindrome(array $strs):array{
        $results = array_map(function($str){
            return $this->checkPalindrome($str);
        },$strs);
        return $results;
    }

    public function checkPalindrome(string $s):bool{
        $rs = strrev($s);
        return $rs === $s;
    }

    public function firstNonRepeatingCharacter(string $s):string{
        $charCount = [];
        
        for ($i = 0; $i < strlen($s); $i++) {
            $char = $s[$i];
            if (isset($charCount[$char])) {
                $charCount[$char]++;
            } else {
                $charCount[$char] = 1;
            }
        }
        
        for ($i = 0; $i < strlen($s); $i++) {
            if ($charCount[$s[$i]] === 1) {
                return $s[$i]; 
            }
        }

        return -1;
    }

    public function areAnagrams(string $str1, string $str2): bool{
        
        $str1 = strtolower(str_replace(' ', '', $str1));
        $str2 = strtolower(str_replace(' ', '', $str2));

        if (strlen($str1) !== strlen($str2)) {
            return false;
        }

        $sortedStr1 = str_split($str1);
        $sortedStr2 = str_split($str2);
        sort($sortedStr1);
        sort($sortedStr2);

        return $sortedStr1 === $sortedStr2;

    }
}

$s = new Solution();
print_r($s->palindrome(['mam', 'madam', 'radar', 'etc'])); echo "<br>";
echo $s->firstNonRepeatingCharacter("swiss") . "<br>";
echo $s->areAnagrams("listen", "silent") ? 'True' : 'False'; echo "<br>";