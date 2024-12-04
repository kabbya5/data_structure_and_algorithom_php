<?php
class TreeNode{
    public $value;
    public $left;
    public $reight;

    public function __construct($value){
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree{
    private $root;

    public function __construct($value){
        $this->root = new TreeNode($value);
    }

    public function insert($value){
        $new_node = new TreeNode($value);
        if($this->root == null){
            $this->root = $new_node;
        }else{
            $this->insertNode($this->root, $new_node);
        }
    }

    private function insertNode($root, $node){
        if($node->value < $root->value){
            if($root->left == null){
                $root->left = $node;
            }else{
                $this->insertNode($root->left, $node);
            }
            
        }else{
            if($root->right == null){
                $root->right = $node;
            }else{
                $this->insertNode($root->right, $node);
            }
        }

    }

    public function search($value){
        return $this->searchValue($this->root, $value);
    }

    private function searchValue($root,$value){
        if($root == null){
            return false;
        }

        if ($root->value == $value){
            return $root->value;
        }elseif($value < $root->value){
            return $this->searchValue($root->left, $value);
        }else{
            return $this->searchValue($root->right, $value);
        }
    }

    public function print(){
        $this->inOrderTraversal(  $this->root);
    }

    private function inOrderTraversal($node){
        if($node !==null){
            echo $node->value;
            $this->inOrderTraversal($node->left);
            $this->inOrderTraversal($node->right);
        }
    }
}

$tree = new BinaryTree(40);

$tree->insert(50);
$tree->insert(30);
$tree->insert(70);
$tree->insert(20);
$tree->insert(40);
$tree->insert(60);
$tree->insert(80);

$tree->print();