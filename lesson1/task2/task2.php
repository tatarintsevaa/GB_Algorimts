<?php
function isPrime($number)
{
    if ($number == 2) {
        return true;
    }

    if ($number % 2 == 0) {
        return false;
    }
    for ($i = 3; $i <= (int)sqrt($number); $i += 2) {
        if ($number % $i == 0)
            return false;
    }
    return true;
}
//$stack = new SplStack();
$arr = [];

//const COUNT = 13195;
const COUNT = 110;
var_dump(sqrt(110));
$start = microtime(true);

for ($i = 3; $i < (int)sqrt(COUNT) + 1; $i +=2) {
    if (COUNT % $i == 0) {
        if (isPrime($i)) {
            array_push($arr, $i);
        }
        if (isPrime(COUNT/$i)) {
            array_push($arr, COUNT/$i);
        }
    }
}

echo microtime(true) - $start . PHP_EOL;
print_r("Наибольший простой делитель числа " . COUNT . " - " . max($arr));