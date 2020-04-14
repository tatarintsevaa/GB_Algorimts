<?php
include 'getArray.php';
include 'linearSearch.php';
include 'binarySearch.php';


$myArray = getArray(8000000);
$randElem = rand(0,8000000);
array_splice($myArray, 6869138,1);
//print_r($myArray);

$start = microtime(true);
//var_dump(linearSearch($myArray));
var_dump('искомый элемент - ' . binarySearch($myArray));
echo microtime(true) - $start;
