<?php
function getArray($num)
{
    $arr = [];
    for ($i = 0; $i < $num; $i++) {
        $arr[$i] = $i + 1;
    }
    return $arr;
}