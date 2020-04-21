<?php
include 'getArray.php';
include 'linearSearch.php';
include 'binarySearch.php';


$myArray = getArray(12225);
$randElem = rand(0,(count($myArray) - 1));
array_splice($myArray, $randElem,1);
//print_r($myArray);

$start = microtime(true);
//var_dump(linearSearch($myArray));
var_dump('искомый элемент - ' . binarySearch($myArray));
echo microtime(true) - $start;
