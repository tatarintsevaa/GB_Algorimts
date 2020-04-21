<?php

function binarySearch($myArray, $num)
{

	$start = 0;
	$end = count($myArray) - 1;

	$n = 0;

	while ($start < $end) {
		$n++;
		$base = floor(($start + $end) / 2);
		echo "Проверяется элемент с индексом: $base" . PHP_EOL;

		if ($myArray[$base] == $num) {
			echo "КОЛИЧЕСТВО ИТЕРАЦИЙ: $n".PHP_EOL;
			return $base;
		} elseif ($myArray[$base] < $num) {
			$start = $base + 1;
		} else {
			$end = $base - 1;
		}

	}
	echo "КОЛИЧЕСТВО ИТЕРАЦИЙ: $n".PHP_EOL;
	return null;
}