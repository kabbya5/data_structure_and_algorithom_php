<?php 
$array = range(1,1000);

function find($array, $target, $low = null, $high = null){
	$low = $low ?? 0;
	$high = $high ?? count($array) - 1;
	
  if ($low > $high) {
      return -1; // Target not found
  }

  $mid = intdiv($low + $high, 2);
	

	if($array[$mid] == $target){
		return $mid;
	}elseif($array[$mid] < $target){
		return find($array, $target, $mid + 1, $high);
	}else{
		return find($array, $target, $low, $mid - 1);
	}
}
print_r($array);
echo "<br>";
$target = 565;
echo find($array,$target);