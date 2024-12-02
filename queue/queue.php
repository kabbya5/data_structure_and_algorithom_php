<?php 

class Node{
    public $value;
    public $next;

    public function __construct($value){
        $this->value = $value;
        $this->next = null;
    }
}

class Queue{
    private $first;
    private $last;
    private $length;

    public function __construct($value){
        $new_node = new Node($value);
        $this->first = $new_node;
        $this->last = $new_node;
        $this->length = 1;
    }

    public function enqueue($value){
        $new_node = new Node($value);
        if($this->first === null){
            $this->first = $new_node;
            $this->last = $new_node;
        }else{
            $this->last->next = $new_node;
            $this->last = $new_node;
        }

        $this->length++;
    }

    public function dequeue(){
        if($this->first === null){
            return null;
        }

        $temp = $this->first;
        $this->first = $temp->next;
        $this->length--;

        if($this->first == null){
            $this->last = null;
        }

        return $temp->value;
    }

    public function isEmpty(){
        return $this->first === null;
    }

    public function print(){
        $temp = $this->first;

        while($temp != null){
            echo "$temp->value ";
            $temp = $temp->next;
        }
    }
}

$q = new Queue(5);
$q->enqueue(2);
$q->enqueue(4);
$q->enqueue(3);
$q->print() ;echo "<br>";
$q->dequeue();
$q->print();