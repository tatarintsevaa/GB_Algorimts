<?php

$a = 5;
$b = &$a;
$b++;
echo $a; //6

function add (&$link) {
	$link++;
}

add($a); //7

function &add2 ($var) {
	$var++;
	return $var;
}

$c = add2($a); //8
$c++;
echo $a; //9

/*-----------------

a + b
+ a b
a b +

a * (b + c)
 * a + b c
a b c + *