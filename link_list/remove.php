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
            $this->head = $new_node;
        }else{
            $this->tail->next = $new_node;
            $this->tail = $new_node;
        }
        $this->length += 1;
    }

    public function prepend($value){
        $new_node = new Node($value);

        if($this->head == null){
            $this->head = $new_node;
            $this->tail = $new_node;
        }else{
            $new_node->next = $this->head;
            $this->head = $new_node;
        }

        $this->length += 1;
    }

    public function popFirst(){
        if($this->length == 0){
            return null;
        }

        $temp = $this->head;
        $this->head = $temp->next;
       
        $this->length -= 1;  

        return $temp->value;
    }

    public function pop(){
        if($this->length == 0){
            return null;
        }

        $pre = $this->head;
        $current = $this->head;

        while($current->next !== null){
            $current = $current->next;
            $pre = $current->next;
        }

        $this->tail = $pre;
        $this->tail->next = null;

        $this->length -= 1;

        return $current->value;
    }

    public function remove($index){
        if($index < 0 || $this->length < $index){
            return null;
        }

        if($index == 0){
            return $popFirst();
        }

        if($index == $this->length - 1){
            return $this->pop();
        }

        $current = $this->head;

        for($i= 1; $i < $index;$i++){
            $pre = $current->next;
        }

        return $current->value;
    }
}