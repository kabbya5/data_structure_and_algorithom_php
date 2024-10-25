<?php 

class TreeNode{
    public $val;
    public $left;
    public $right;

    public function __construct(int $val = 0) {
        $this->val = $val;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree{
    private $root;

    public function insert(int $val){
        $new_node = new TreeNode($val);

        if($this->root == null){
            $this->root = $new_node;
            return true;
        }

        $temp = $this->root;

        while(true){
            if($new_node->val == $temp->val){
                return false;
            }

            if($new_node->val < $temp->val){
                if($temp->left == null){
                    $temp->left = $new_node;
                    return true;
                }

                $temp = $temp->left;
            }else{
                if($temp->right == null){
                    $temp->right = $new_node;
                    return true;
                }

                $temp = $temp->right;
            }
        }
    }

    public function __construct( int $val = null) {
        if($val){
            $this->insert($val);
        }
    }

    private function printInOrder($node = null){
        if($node !== null){
            $this->printInOrder($node->left);
            echo $node->val . ' ';

            $this->printInOrder($node->right);
        }
    }

    
    public function printTree(){
        $this->printInOrder($this->root);
    }

    public function kthLargestLevelSum($k){
        $root = $this->root;
        if($root == null){
            return -1;
        }

        $queue = new splQueue();
        $queue->enqueue($root);

        $level_sums = [];

        while(!$queue->isEmpty()){
            $level_size = $queue->count();
            $level_sum = 0;

            for($i = 0; $i < $level_size; $i++){
                $node = $queue->dequeue();
                $level_sum += $node->val;

                if($node->left !== null){
                    $queue->enqueue($node->left);
                }

                if($node->right !== null){
                    $queue->enqueue($node->right);
                }
            }

            $level_sums[] = $level_sum;
        }
        rsort($level_sums);

        if ($k > count($level_sums)) {
            return -1;
        }
    
        return $level_sums[$k - 1];

    }
}

$tree = new BinaryTree(5);
$tree->insert(8);
$tree->insert(9);
$tree->insert(3);
$tree->insert(7);
$tree->insert(1);
$tree->insert(2);
$tree->insert(4);
$tree->insert(6);

// $tree->printTree();

$k = 2;
$result = $tree->kthLargestLevelSum( $k);

echo "The {$k}th largest level sum is: $result\n";  
