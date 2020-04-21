<?php

// 0 1 1 2 3 5 8 13 21 34

//echo fib(10000000).PHP_EOL;
//echo fibonacci(99);

function fibonacci($n){
	if ($n == 0) return 0;
	if ($n == 1) return 1;
	return fibonacci($n - 1) + fibonacci($n - 2);
}

function fib ($num) {
	$first = 0;
	$second = 1;

	for ($i = 0; $i< $num; $i++) {
		if($i<=1) {
			$next = $i;
		}
		else {
			$next = $first + $second;
			$first = $second;
			$second = $next;
		}
//		echo $next." ";
	}
	return $second;
}




$A = [0, 1];
echo (arr(99, $A));

function arr(int $n, &$A) {
	for ($i=1; $i<=$n; $i++)
		$A[] = -1;
	return F($n);
}

function F(int $n) {

	global $A;

	if ($A[$n] != -1) return $A[$n];

	if ($n < 2) return 1;

	$A[$n] = F($n - 1) + F($n - 2);
	return $A[$n];

}