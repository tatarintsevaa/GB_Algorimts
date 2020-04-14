<?php

function linearSearch($myArray)
{
    $count = count($myArray);
    for ($i = 0; $i < $count; $i++) {
        if (($myArray[$i + 1] - $myArray[$i]) != 1) return $myArray[$i] + 1;
    }
}



