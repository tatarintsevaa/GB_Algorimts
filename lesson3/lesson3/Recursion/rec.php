<?php

function tail($n) {
	if($n == 0) {
		return;
	}

	else {
		echo $n." ";
	}

	tail($n - 1);
}









//----------------------------
function head($n) {
	if($n == 0) {
		return;
	}

	else {
		head($n - 1);

	}
	echo $n." ";
}


head(10);
echo PHP_EOL;
tail(10);