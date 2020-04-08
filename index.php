<?php

class arraySpinner
{
    public $rows;
    public $columns;
    public $cellCount;
    public $count = 1;
    public $finalArray = [];

    private $directions = [
        'right' => true,
        'left' => false,
        'down' => false,
        'up' => false,
    ];

    /**
     * arraySpinner constructor.
     * @param $rows
     * @param $columns
     */
    public function __construct($rows, $columns)
    {
        $this->rows = $rows;
        $this->columns = $columns;
        $this->cellCount = $this->rows * $this->columns;
    }

    public function getSpinnerArray()
    {
        $x = 0;
        $y = 0;
        $stepsCount = 0;
        while ($this->count <= $this->cellCount) {
//            var_dump($this->finalArray);

            if ($this->directions['right']) {
                if ($stepsCount == $this->columns) {
                    $this->changeOfDirection('down');
                    $this->rows--;
                    $stepsCount = 0;

                } else {
                    $y++;
                    $stepsCount++;
                }

            }

            if ($this->directions['down']) {
                if ($stepsCount == $this->rows) {
                    $this->changeOfDirection('left');
                    $this->columns--;
                    $stepsCount = 0;
                } else {
                    $x++;
                    $stepsCount++;
                }
            }
            if ($this->directions['left']) {
                if ($stepsCount == $this->columns) {
                    $this->changeOfDirection('up');
                    $this->rows--;
                    $stepsCount = 0;
                } else {
                    $y--;
                    $stepsCount++;
                }

            }
            if ($this->directions['up']) {
                if ($stepsCount == $this->rows) {
                    $this->changeOfDirection('right');
                    $this->columns--;
                    $stepsCount = 0;
                    continue;
                } else {
                    $x--;
                    $stepsCount++;
                }
            }

            $this->finalArray[$x][$y] = $this->count;
            $this->count++;

        }
// мне не нравиться, что приходиться снова сортировать. Но на другой вариант времени не хватило
        foreach ($this->finalArray as &$arr) {
            ksort($arr);
        }
        return $this->finalArray;
    }

    public function changeOfDirection($direction)
    {
        foreach ($this->directions as $key => $value) {
            if ($direction == $key) {
                $this->directions[$key] = true;
            } else {
                $this->directions[$key] = false;
            }
        }
    }


}

//function arraySpinner($x, $y)
//{
//    $row = $x;
//    $column = $y;
//    $arr = [];
//    $cellCount = $row * $column;
//    $cont = 1;
//
//
//    return $arr;
//}

$arr = (new arraySpinner(4, 4))->getSpinnerArray();
//var_dump($arr2);

//foreach ($arr as $item) {
//    foreach ($item as $value) {
//        echo $value . ' ';
//    }
//    echo '</br>';
//}
?>
<table style="align-items: center;">
    <? foreach ($arr as $key => $item): ?>
        <tr>
            <td style="border: 1px solid red; padding: 5px; align-items: center; font-size: 20px">
                <?= $key ?>
            </td>
            <? foreach ($item as $keys => $value): ?>
                <td style="border: 1px solid lightgray; padding: 5px; align-items: center; font-size: 20px">
                    <?= $value ?>
                </td>
            <? endforeach; ?>

        </tr>
    <? endforeach; ?>

    <tr>
        <td style="border: 1px solid lightgray; padding: 5px; align-items: center; font-size: 20px"></td>
        <? foreach ($arr[0] as $key => $value): ?>
            <td style="border: 1px solid red; padding: 5px; align-items: center; font-size: 20px">
                <?= $key?>
            </td>
        <? endforeach; ?>
    </tr>
</table>

