<?php 

class Node {
    public $value;
    public $left;
    public $right;

    public function __construct($value){
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree {
    public $root;

    public function __construct($value = null){
        $this->root = null;
        if($value !== null){
            $this->insert($value);
        }
    }

    public function insert($value){
        $new_node = new Node($value);
        if($this->root === null){
            $this->root = $new_node;
        } else {
            $this->insertNode($this->root, $new_node);
        }
    }

    private function insertNode($root, $new_node){
        if($new_node->value < $root->value){
            if($root->left === null){
                $root->left = $new_node;
            } else {
                $this->insertNode($root->left, $new_node);
            }
        } else {
            if($root->right === null){
                $root->right = $new_node;
            } else {
                $this->insertNode($root->right, $new_node);
            }
        }
    }

    public function print(){
        $this->inOrderTraversal($this->root);
    }

    private function inOrderTraversal($node){
        if($node !== null){
            $this->inOrderTraversal($node->left);
            echo $node->value . " ";
            $this->inOrderTraversal($node->right);
        }
    }
}

$tree = new BinaryTree(5);

$tree->insert(4);
$tree->insert(9);
$tree->insert(1);
$tree->insert(10);
$tree->insert(null);
$tree->insert(7);


$tree->print();
