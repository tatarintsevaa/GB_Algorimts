<?php


//Размерность массива
$n = 55;
$m = 99;

//Функция заполнения
//$n - количество столбцов
//$m - количество строк
//$x - итератор внутреннего цикла
//$y - итератор внешнего цикла
function s($n, $m, $x, $y)
{
	return $y ? $n + s($m - 1, $n, $y - 1, $n - $x - 1) : $x;
}

//Вывод массива в виде таблицы
echo '<table class="centered striped white">';
echo '<thead class="blue darken-2 white-text">';
echo '<tr>';
for ($k = 0; $k < $n; $k++) {
	echo '<th> </th>';
}
echo '</tr>';
echo '</thead>';
echo '<tbody>';
for ($i = 0; $i < $m; $i++) {
	echo '<tr>';
	for ($j = 0; $j < $n; $j++) {
		echo '<td>' . s($n, $m, $j, $i) . '</td>';
	}
	echo '</tr>';
}
echo '</tbody>';
echo '</table>';