<?php

function firstNInts($n) {
	$sum = 0;
	for ($i = 1; $i <= $n; $i = $i + 1) {
		$sum += $i;
	}
	return $sum;
}

?>