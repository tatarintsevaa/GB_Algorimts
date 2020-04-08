<?php

function narcissistic(int $value): bool {
    $arr = [];
    $i = $value;
    while ($i != 0) {
       array_push($arr, $i % 10 );
       $i = (int)($i / 10);
    }
    $count = count($arr);
    $val2 = null;
    foreach ($arr as $item) {
        $val2 += $item**$count;
    }
    return $val2 == $value ? true : false;
}

print_r(narcissistic(15333));
