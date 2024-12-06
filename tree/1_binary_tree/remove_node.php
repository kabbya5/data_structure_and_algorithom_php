<?php 

class Node{
    public $value;
    public $left;
    public $right;

    public function __construct($value){
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree{
    private $root;

    public function __construct($value){
        $this->root = new Node($value);
    }

    public function insert($value){
        $new_node = new Node($value);

        if($this->root == null){
            return $this->root = $new_node;
         }

        $this->insertNode($this->root, $new_node);
    }

    private function insertNode($node, $new_node){
        
        if($node->value > $new_node->value){
            if($node->left == null){
                $node->left = $new_node;
            }else{
                $this->insertNode($node->left, $new_node);
            }
        }else{
            if($node->value < $new_node->value){
                if($node->right == null){
                    $node->right = $new_node;
                }else{
                    $this->insertNode($node->right, $new_node);
                }
            }
        }
    }

    public function search($value){
        if($this->root === null){
            return "Root is Empty";
        }

        return $this->searchNode($this->root, $value);
    }

    private function searchNode($node, $value){
        if($node === null) return " Data not Found !";

        if($node->value === $value){
            return "The $value is Found";
        }

        if($value < $node->value){
            return $this->searchNode($node->left, $value);
        }else{
            return $this->searchNode($node->right, $value);
        }
    }

    public function printInOrder(){
        $this->inOrder($this->root);
    }

    private function inOrder($node){
        if($node !== null){
            $this->inOrder($node->left);
            echo "$node->value ";
            $this->inOrder($node->right);
        }
    }

    public function printPreOrder(){
        $this->preOrder($this->root);
    }

    private function preOrder($node){
        if($node !== null){
            echo "$node->value ";
            $this->preOrder($node->left);
            $this->preOrder($node->right);
        }
    }

    public function printPostOrder() {
        $this->postOrder($this->root);
    }
    
    private function postOrder($node) {
        if ($node !== null) {
            $this->postOrder($node->left);
            $this->postOrder($node->right);
            echo $node->value . " ";
        }
    }

    public function printLevelOrder() {
        if ($this->root === null) {
            return;
        }
    
        $queue = [];
        array_push($queue, $this->root);
    
        while (!empty($queue)) {
            $node = array_shift($queue);
            echo $node->value . " ";
    
            if ($node->left !== null) {
                array_push($queue, $node->left);
            }
            if ($node->right !== null) {
                array_push($queue, $node->right);
            }
        }
    }

    public function removeNode($root, $value) {
        if ($root === null) {
            return null;
        }

        if ($value < $root->value) {
            $root->left = $this->removeNode($root->left, $value);
        } elseif ($value > $root->value) {
            $root->right = $this->removeNode($root->right, $value);
        } else {
            // Case 1: Node with no children (leaf node)
            if ($root->left === null && $root->right === null) {
                return null;
            }

            // Case 2: Node with one child
            if ($root->left === null) {
                return $root->right;
            } elseif ($root->right === null) {
                return $root->left;
            }

            // Case 3: Node with two children
            $inOrderSuccessor = $this->findMin($root->right);
            $root->value = $inOrderSuccessor->value;
            $root->right = $this->removeNode($root->right, $inOrderSuccessor->value);
        }

        return $root;
    }

    // Helper function to find the minimum value in a tree
    private function findMin($node) {
        while ($node->left !== null) {
            $node = $node->left;
        }
        return $node;
    }
}

$tree = new BinaryTree(10);
$tree->insert(5);
$tree->insert(15);
$tree->insert(3);
$tree->insert(7);
$tree->insert(12);
$tree->insert(18);

echo "In-order Traversal: <br>";
$tree->printInOrder(); 
echo "<br>";

echo "\nPre-order Traversal: <br>";
$tree->printPreOrder(); 
echo "<br>";

echo "\nPost-order Traversal: <br>";
$tree->printPostOrder(); 
echo "<br>";

echo "\nLevel-order Traversal: <br>";
$tree->printLevelOrder(); 
echo "<br>";

echo "\nLevel-order Traversal: <br>";
echo $tree->search(10); 
echo "<br>";

