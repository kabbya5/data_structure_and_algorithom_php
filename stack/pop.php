<?php 

class Node{
    public $val;
    public $next;

    public function __construct($val){
        $this->val = $val;
        $this->next = null;
    }
}

class Stack{
    private $first;
    private $last;
    private $height;

    public function __construct($val = null){
        if($val){
            $new_node = new Node($val);
            $this->first = $new_node;
            $this->last = $new_node;
            $this->height = 1;
        }
    }

    public function push($val){
        $new_node = new Node($val);
        if($this->first == null){
            $this->first = $new_node;
            $this->last = $new_node;
        }else{
            $new_node->next = $this->first;
            $this->first = $new_node;
        }

        $this->height += 1;
    }

    public function pop(){
        if($this->height == 0){
            return false;
        }
        $temp = $this->first;
        $this->first = $temp->next;
        $temp = null;

        $this->height -= 1;

        if($this->height == 0){
            $this->first = null;
            $this->last = null;
        }
    }

    public function print(){
        $current = $this->first;

        while($current !== null){
            echo "$current->val </br>";
            $current = $current->next;
        }
    }
}

$stack = new Stack(4);
$stack->push(1);
echo "The Stack is <br>";
$stack->print();

$stack->pop();

echo "The Stack is <br>";
$stack->print();