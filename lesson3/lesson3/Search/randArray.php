<?php
const COUNT = 10000;
const MIN_RAND = 1;
const MAX_RAND = 30000;


function _randArray ($count = COUNT, $minRand = MIN_RAND, $maxRand = MAX_RAND):array {
	if ($count != COUNT && $count>$maxRand-$minRand)  {
		$minRand = 1;
		$maxRand = $count * 3;
	}
	$myArray = [];
	for ($i= 0; $i < $count; $i++) {
		do {
			$num = mt_rand($minRand, $maxRand);
		} while (in_array($num, $myArray)) ;
		$myArray[] = $num;
	}
	return $myArray;
}

function _quickSort (array $mas) {

	$count = count($mas);

	if($count <= 1) {
		return $mas;
	}

	$baseEl = $mas[0];

	$left = [];
	$right = [];

	for ($i = 1; $i< $count; $i++) {
		if ($mas[$i] <= $baseEl) {
			$left[] = $mas[$i];
		}
		else {
			$right[] = $mas[$i];
		}
	}
	$left = _quickSort($left);
	$right = _quickSort($right);

	return array_merge($left, [$baseEl], $right);

}

function getSortRandArray($count = COUNT, $minRand = MIN_RAND, $maxRand = MAX_RAND) {
//	$array = ;
	return _quickSort(_randArray());
}

