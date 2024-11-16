<?php 
$string = "I am php programer";
echo strlen($string) . " <br>"; // Output: 18

$new_string = substr($string, 0);
echo $new_string . "<br>"; //"I am php programer";

$new_string = substr($string, 0, 5);
echo $new_string . "<br>"; //"I am";

$new_string = substr($string, 5, 3);
echo $new_string . "<br>"; //"php";

$new_string = substr($string, -9);
echo $new_string . "<br>"; //"Programer";

$new_string = substr($string, -13, 3);
echo $new_string . "<br>"; //"php";
