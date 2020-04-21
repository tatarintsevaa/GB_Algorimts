<?php
$array = [1, 2 ,3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];
function lost($array){
    while(count($array) > 3){
        $left = array_slice($array, 0, count($array)/2);
        $right = array_slice($array, count($array)/2);

        if((end($left) - $left[0] + 1) == count($left)){
            $array = $right;
            if((end($array) - $array[0] + 1) == count($array)){
                return $array[0] - 1;
            }
        }
        else{
            $array = $left;
            if((end($array) - $array[0] + 1) == count($array)){
                return $array[0] + 1;
            }
        }
    }
    if($array[1] - $array[0] == 1){
        return $array[1] + 1;
    }else{
        return $array[1] - 1;
    }

}
echo 'Массив: ' .implode(',',$array) . '<br>';
echo "Пропущенное число :" .lost($array);


