<?php

function interpolationSearch($myArray, $num)
{
	$start = 0;
	$end = count($myArray) - 1;

	$n = 0;

	while (($start < $end) && ($num >= $myArray[$start]) && ($num <= $myArray[$end])) {

		$n++;
		$base = floor($start + (
				(($end - $start) / ($myArray[$end] - $myArray[$start]))
				* ($num - $myArray[$start])));


		if ($myArray[$base] == $num) {
			echo "КОЛИЧЕСТВО ИТЕРАЦИЙ: $n" . PHP_EOL;
			return $base;
		} elseif ($myArray[$base] < $num) {
			$start = $base + 1;
		} else {
			$end = $base - 1;
		}

	}

	echo "КОЛИЧЕСТВО ИТЕРАЦИЙ: $n" . PHP_EOL;
	return null;
}