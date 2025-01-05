<?php 

class TreeNode {
    public $value;
    public $left;
    public $right;

    public function __construct($value) {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class PerfectBinaryTree {
    public $root;

    public function __construct($value) {
        $this->root = new TreeNode($value);
    }

    public function insert($value) {
        $newNode = new TreeNode($value);
        if ($this->root === null) {
            $this->root = $newNode;
        } else {
            $this->insertNode($this->root, $value);
        }
    }

    private function insertNode($node, $value) {
        if ($node === null) {
            return;
        }

        if ($node->left === null) {
            $node->left = new TreeNode($value);
        } elseif ($node->right === null) {
            $node->right = new TreeNode($value);
        } else {
            $this->insertNode($node->left, $value);
        }
    }

    public function display() {
        if ($this->root === null) {
            return;
        }

        $queue = [$this->root];
        $output = [];

        while (!empty($queue)) {
            $current = array_shift($queue);
            $output[] = $current->value;

            if ($current->left) {
                $queue[] = $current->left;
            }

            if ($current->right) {
                $queue[] = $current->right;
            }
        }

        echo "[" . implode(",", $output) . "]";
    }
}

$tree = new PerfectBinaryTree(2);
$tree->insert(2);
$tree->insert(3);
$tree->insert(5);
$tree->insert(8);
$tree->insert(13);
$tree->insert(21);
$tree->insert(34);
$tree->display(); 

$root = $tree->root;


function reverseOddLevels($root) {
    dfs($root->left, $root->right, true);
    return $root;
}

function dfs($left, $right, $isOddLevel) {
    if ($left === null) {
        return;
    }

    if ($isOddLevel) {
        $temp = $left->value;
        $left->value = $right->value;
        $right->value = $temp;
    }

    dfs($left->left, $right->right, !$isOddLevel);
    dfs($left->right, $right->left, !$isOddLevel);
}



print_r(reverseOddLevels($root));
