<!-- 
Tam Tran
Stephanie Marcellin
 -->

<?php

function shiftArray($arr) {
	$temp = array_shift($arr);
	array_push($arr, $temp);
	return $arr;
}

?>