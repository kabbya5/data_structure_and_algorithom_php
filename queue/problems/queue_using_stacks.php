<?php 

class Node{
    public $value;
    public $next;

    public function __construct($value){
        $this->value = $value;
        $this->next = null;
    }
}

class Stack{
    private $top;
    private $bottom;
    private $length;

    public function __construct(){
        $this->top = null;
        $this->bottom = null;
        $this->length = 0;
    }

    public function push($value){
        $new_node = new Node($value);
        if($this->top == null){
            $this->top = $new_node;
            $this->bottom = $new_node;
        }else{
            $new_node->next = $this->top;
            $this->top = $new_node;
        }

        $this->length++;
    }

    public function pop(){
        if($this->isEmpty()){
            return new Exception("Stack is Empty");
        }

        $value = $this->top->value;
        $this->top = $this->top->next;

        if($this->top == null){
            $this->bottom = null;
        }

        $this->length -= 1;

        return $value;
    }

    public function peek(){
        if($this->isEmpty()){
            throw new Exception("Stack is empty");
        }

        return $this->top->value;
    }

    public function isEmpty(){
        return $this->top === null;
    }
}

class QueueUsingStack{
    private $stack1;
    private $stack2;


    public function __construct(){
        $this->stack1 = new Stack();
        $this->stack2 = new Stack();
    }

    public function enqueue($value){
        $this->stack1->push($value);
    }

    public function dequeue(){
        if($this->stack2->isEmpty()){
            while(!$this->stack1->isEmpty()){
                $this->stack2->push($this->stack1->pop());
            }
        }

        if ($this->stack2->isEmpty()) {
            throw new Exception("Queue is empty!");
        }

        return $this->stack2->pop();
    }

    public function peek() {
        if ($this->stack2->isEmpty()) {
            while (!$this->stack1->isEmpty()) {
                $this->stack2->push($this->stack1->pop());
            }
        }

        if ($this->stack2->isEmpty()) {
            throw new Exception("Queue is empty!");
        }

        return $this->stack2->peek();
    }

    public function isEmpty() {
        return $this->stack1->isEmpty() && $this->stack2->isEmpty();
    }
}

$queue = new QueueUsingStack();

$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);

echo $queue->dequeue() . PHP_EOL; 
echo $queue->peek() . PHP_EOL;    
echo $queue->dequeue() . PHP_EOL; 
$queue->enqueue(40);
echo $queue->dequeue() . PHP_EOL; 
