<?php 

class Node{
    public $val;
    public $left;
    public $right;

    public function __construct($val){
        $this->val = $val;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree{
    private $root;

    public function __construct($val = null)
    {
        if($val){
            if($this->root == null){
                $new_node = new Node($val);
                $this->root = $new_node;
            }
        }
    }

    public function insert($val){
        $new_node = new Node($val);
        if($this->root == null){
            $this->root = $new_node;
        }else{
            $this->insertNode($new_node,$this->root);
        }
    }

    private function insertNode($new_node, $root){
        if($new_node->val < $root->val){
            if($root->left == null){
                $root->left = $new_node;
            }else{
                $this->insertNode($new_node, $root->left);
            }
        }else{
            if($root->right == null){
                $root->right = $new_node;
            }else{
                $this->insertNode($new_node, $root->right);
            }
        }
    }

    public function print(){
        $this->inOrderTraversal($this->root);
    }

    private function inOrderTraversal($node){
        if($node !== null){
            echo $node->val;
            $this->inOrderTraversal($node->left);
            $this->inOrderTraversal($node->right);
        }
    }
}

class solution{
    function treeQueries($root, $queries) {
        $subtreeHeights = [];

        $tree_height = $this->dfs($root, $subtreeHeights);
        $result = [];

        $this->calculateHeightExcludingSubtree($root, 0, $subtreeHeights, $result);

        $queryResults = [];

        foreach ($queries as $query) {
            $queryResults[] = $result[$query];
        }
        
        return $queryResults;
    }

    private function dfs($node, &$subtreeHeights){
        if($node == null){
            return -1;
        }

        $leftHeight = $this->dfs($node->left, $subtreeHeights);
        $rightHeight = $this->dfs($node->right, $subtreeHeights);

        $height = 1 + max($leftHeight, $rightHeight);
        $subtreeHeights[$node->val] = $height;

        return $height;
    }

    private function calculateHeightExcludingSubtree($node, &$subtreeHeights, &$result) {
        if ($node === null) {
            return;
        }
        
        // Calculate the height excluding the current node's subtree
        $leftHeight = isset($subtreeHeights[$node->left->val]) ? $subtreeHeights[$node->left->val] : 0;
        $rightHeight = isset($subtreeHeights[$node->right->val]) ? $subtreeHeights[$node->right->val] : 0;

        // If this node is removed, consider heights of the remaining children
        $result[$node->val] = max($leftHeight, $rightHeight) + 1;

        // Recursively calculate for children
        $this->calculateHeightExcludingSubtree($node->left, $subtreeHeights, $result);
        $this->calculateHeightExcludingSubtree($node->right, $subtreeHeights, $result);
    }

}

$tree = new BinaryTree(1);

// Dynamically insert nodes to match the structure in your image
$tree->insert(3);  // Left child of 1
$tree->insert(4);  // Right child of 1
$tree->insert(2);  // Left child of 3
$tree->insert(6);  // Left child of 4
$tree->insert(5);  // Right child of 4
$tree->insert(7);  // Right child of 5
$tree->print();