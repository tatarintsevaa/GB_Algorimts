<?php
// доп
// Дано слово, состоящее только из строчных латинских букв. Проверить, является ли оно палиндромом.
// При решении этой задачи нельзя пользоваться циклами.
//Вариант №1
//

//1. Реализовать построение и обход дерева для математического выражения
//2. **Реализовать решение уравнений и примеров из 1 задания
//3. Рассмотреть подход прямой и обратной польских нотаций. Чем они лучше деревьев в первой задаче? Нужны ли деревья в
// их реализации?

//1. выражение (x+42)^2+7*y-z
class BinaryNode
{

    public $value;
    public $parent = null;
    public $left = null;
    public $right = null;

    public function __construct($value)
    {
        $this->value = $value;

    }
}


class Tree
{
    public $root;
    public $expression = '';

    /**
     * Tree constructor.
     * @param string $expression
     */
    public function __construct($expression)
    {
        $this->expression = $expression;
        $this->root = null;
    }

    private function expToArray()
    {
        return preg_split('//', $this->expression, -1, PREG_SPLIT_NO_EMPTY);
    }

    public function insert($item) {
        $node = new BinaryNode($item);
        if ($this->root === null && toolFunc::isOperator($item)) {
            $this->root = $node;
        }

        else
        {
            $this->insertNode($node, $this->root);
        }
    }

    protected function insertNode($node, &$subtree)
    {

    }

    public function fillTree()
    {
        $arrExp = array_reverse($this->expToArray());

        for ($i = 0; $i < count($arrExp); $i++) {
            $symbol = $arrExp[$i];
            if (is_numeric($symbol)) {
                $number = null;
                while (is_numeric($arrExp[$i])) {
                    $number .= $arrExp[$i++];
                }
                $i--;
                $this->insert($number);
            }

        }



    }

//        for ($i = 0; $i < count($expArr); $i++) {
//            $currentValue = $expArr[$i];
//            if (is_numeric($currentValue)) {
//
//            }
//        }


}

class toolFunc
{

    public static function isOperator($ch)
    {
        $operators = ['^', '*', '/', '+', '-'];
        return in_array($ch, $operators);
    }

    public static function priority($operator)
    {
        switch ($operator) {
            case '^' :
                return 3;
            case '*' :
            case '/' :
                return 2;
            case '+' :
            case '-' :
                return 1;
        }
        return 0;
    }

}

$exp = '(x+42)^2+7*y-z';
$tree = new Tree($exp);
//var_dump($tree->fillTree());