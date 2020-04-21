<?php

class BinaryNode
{
	public $value;
	public $left = null;
	public $right = null;
/*
	public $podchin;
	public $isBlack;*/

	public function __construct($value)
	{
		$this->value = $value;

	}
}


class BinaryTree {

	public $root;

	/**
	 * BinaryTree constructor.
	 * @param $root
	 */
	public function __construct()
	{
		$this->root = null;
	}

	public function insert($item)
	{
		$node = new BinaryNode($item);
		if ($this->root === null) {
			$this->root = $node;
		}

		else
		{
			$this->insertNode($node, $this->root);
		}
	}

	protected function insertNode ($node, &$subtree) {

		if ($subtree === null) {
			$subtree = $node;
		}

		if ($subtree->value < $node->value) {
			$this->insertNode($node, $subtree->right); }

		elseif ($subtree->value > $node->value) {
			$this->insertNode($node, $subtree->left);
		}

	}

	public function delete($value) {

		if ($this->root === null) {
			throw new Exception('Дерево пустое');
		}

		$node = &$this->findNode($value, $this->root);

		if ($node) {
			$this->deleteNode($node);
		}
	}


	public function &findNode($value, BinaryNode &$subtree)
	{
		if (is_null($subtree)) {
			return false;
		}

		if ($subtree->value > $value) {
			return $this->findNode($value, $subtree->left);
		} elseif ($subtree->value < $value) {
			return $this->findNode($value, $subtree->right);
		} else {
			return $subtree;
		}

	}

	protected function deleteNode(BinaryNode &$node)
	{
		if (is_null($node->left) && is_null($node->right)) {
			$node = null;
		}

		elseif (is_null($node->left)) {
			$node = $node->right;
		}
		elseif (is_null($node->right)) {
			$node = $node->left;
		}

		else {
			if (is_null($node->right->left)) {
				$node = $node->left;
			}
			else {
				$node->value = $node->right->left->value;
				$this->deleteNode($node->right->left);
			}
		}

		// [1 2 4 6] 7 [9 10 12 14]

	}

}

$tree = new BinaryTree();
$tree->insert(50);
$tree->insert(30);
$tree->insert(77);
$tree->insert(64);
$tree->insert(44);
$tree->insert(12);
$tree->insert(22);
$tree->insert(100);
$tree->insert(114);
$tree->insert(98);
$tree->insert(0);
$tree->insert(32);

$tree->delete(50);
$tree->delete(100);

print_r($tree);