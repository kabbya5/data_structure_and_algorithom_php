<?php 

class Node{
    public $value;
    public $next;

    public function __construct($value){
        $this->value = $value;
        $this->next = null;
    }
}

class LinkList{
    private $head;
    private $tail;
    private $length;

    public function __construct($value = null){
        if($value){
            $new_node = new Node($value);
            $this->head = $new_node;
            $this->tail = $new_node;
            $this->length = 1;

        }
    }

    public function append($value){
        $new_node = new Node($value);
        if($this->head == null){
            $this->head = $new_node;
            $this->tail = $new_node;
        }else{
            $this->tail->next = $new_node;
            $this->tail = $new_node;
        }

        $this->length += 1;
    }

    public function prepend($value){
        $new_node = new Node($value);
        
        if($this->length == 0){
            $this->head = $new_node;
            $this->tail = $new_node;
        }else{
            $new_node->next = $this->head;
            $this->head = $new_node; 
        }

        $this->length += 1;
    }

    public function pop(){
        if($this->length == 0){
            return null;
        }

        $pre = $this->head;
        $temp = $this->head;

        while($temp->next){
            $pre = $temp;
            $temp = $temp->next;
        }

        $this->tail = $pre;
        $this->tail->next = null;

        if($this->length == 0){
            $this->head = null;
            $this->tail = null;
        }

        return $pre->value;
    }

    public function print(){
        $temp = $this->head;

        while($temp !== null){
            echo "$temp->value ,";
            $temp = $temp->next;
        }
    }
}

$list = new LinkList(1);
$list->print();
echo "<br>";
$list->append(10);
$list->print();
echo "<br>";
$list->prepend(20);
$list->print();
echo "<br>";
$list->pop();
$list->print();