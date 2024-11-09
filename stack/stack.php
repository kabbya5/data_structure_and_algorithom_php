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
    private $top;
    private $bottom;
    private $length = 0;

    public function __construct( array $arr = []){
        if(count($arr) > 0){
            foreach($arr as $val){
                $this->push($val);
            }
        }
    }

    public function push($val){
        $new_node = new Node($val);

        if($this->top == null){
            $this->top = $new_node;
            $this->bottom = $new_node;
        }else{
            $new_node->next = $this->top;
            $this->top = $new_node;
        }

        $this->length += 1;

        return true;
    }

    public function print(){
        $current = $this->top;

        while($current !== null){
            echo "$current->val </br>";
            $current = $current->next;
        }
    }
}

$stack = new Stack([4,2,5]);
echo "The Stack is <br>";
$stack->print();