<?php

include 'randArray.php';
include 'LinearSearch.php';
include 'BinarySearch.php';
include 'InterpolationSearch.php';

const NUM = 5000;

$arr = getSortRandArray();

//print_r($arr);

echo "Линейный поиск".PHP_EOL;
echo linearSearch($arr, NUM);

echo "Бинарный поиск".PHP_EOL;
echo binarySearch($arr, NUM);

echo "Интерполяционный".PHP_EOL;
echo interpolationSearch($arr, NUM);
