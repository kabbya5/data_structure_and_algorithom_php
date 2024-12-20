<?php 
$arr = [1,2,3,4,5,6,7];
$temp = new SplPriorityQueue();
$max_heap = [];
foreach($arr as $i => $item){
    $temp->insert($i, $item);
}

do{
    $max_heap[] = $temp->extract();
}while(!$temp->isEmpty());

print_r($max_heap);