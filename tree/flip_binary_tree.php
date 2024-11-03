<?php 

class node{
    public $value;
    public $left;
    public $right;

    function __construct($value){
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree{
    public $root;
    
    public function __construct($value = null){
        if($value){
            $new_node = new Node($value);
            $this->root = $new_node;
        }
        return;
    }

    public function insert($value){
        $new_node = new Node($value);

        if($new_node == null){
            $this->root = $new_node;
        }else{
            $this->insertNode($this->root, $new_node);
        }

    }

    private function insertNode($node,$new_node){
        if($new_node->value < $node->value){
            if($node->left == null){
                $node->left = $new_node;
            }else{
                $this->insertNode($node->left, $new_node);
            }
        }else{
            if($node->right == null){
                $node->right = $new_node;
            }else{
                $this->insertNode($node->right, $new_node);
            } 
        }
    }

    public function print(){
        $this->inOrderTraversal($this->root);
    }

    private function inOrderTraversal($node){
        if($node !==null){
            echo $node->value;
            $this->inOrderTraversal($node->left);
            $this->inOrderTraversal($node->right);
        }
    }
}

class Solution{
    public function flipEquiv($root1,$root2){
        if($root1 == null && $root2 == null){
            return true;
        }
        
        if($root1 == null || $root2 == null || $root1->value !== $root2->value){
            return false;
        }

        return ($this->flipEquiv($root1->left, $root2->left) && $this->flipEquiv($root1->right, $root2->right)) ||
                ($this->flipEquiv($root1->left,$root2->right) && $this->flipEquiv($root1->right, $root2->left));
        
    }
}

$tree = new BinaryTree(1);
// $tree->insert(2);
// $tree->insert(3);
// $tree->insert(4);
// $tree->insert(5);
// $tree->insert(6);
// $tree->insert(7);
// $tree->insert(8);

$tree2 = new BinaryTree(1);
$tree2->insert(3);
$tree2->insert(2);
$tree2->insert(6);
$tree2->insert(4);
$tree2->insert(5);
$tree2->insert(8);
$tree2->insert(7);


$sl = new Solution();
print_r($sl->flipEquiv($tree->root, $tree2->root));