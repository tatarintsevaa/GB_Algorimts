<?php

function binarySearch($myArray)
{
    $start = 0;
    $end = count($myArray) - 1;
    $iterationCount = 0;
    while ($start <= $end) {
        $iterationCount++;
        $middle = floor(($start + $end) / 2);
        echo $iterationCount . ') проверяеться элемент - ' . $myArray[$middle] . '</br>';
        if (($myArray[$middle + 1] - ($myArray[$middle] )) == 2) {
            return $myArray[$middle] + 1;
        }
        elseif (($myArray[$middle] - $middle) == 1) {
            $start = $middle + 1;
        }
        elseif (($myArray[$middle] - $middle) == 2 ) {
            $end = $middle - 1;
        }

//        var_dump('middle ' . $middle);
//        var_dump('arr[middle] ' . $myArray[$middle]);
//        var_dump('arr[middle - 1] ' . $myArray[$middle - 1]);
//        var_dump('start ' . $start);
//        var_dump('end ' . $end);

    }
        return null;

}