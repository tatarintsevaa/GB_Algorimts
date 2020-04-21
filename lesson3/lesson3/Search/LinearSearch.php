<?php

function linearSearch ($myArray, $num) {
 $count = count($myArray);

 for ($i = 0; $i < $count; $i++) {
	 echo "Проверяется элемент с индексом: $i" . PHP_EOL;
	 if ( $myArray[$i] == $num) {
 		return $i;
	}
 	elseif ($myArray[$i] > $num) return null;
 }
}