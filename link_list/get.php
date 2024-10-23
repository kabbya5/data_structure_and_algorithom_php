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

    public function __construct(array $nums = null){
        foreach($nums as $num){
            $this->append($num);
        }
    }

    public function append($value){
        $new_node = new Node($value);

        if($this->head == null){
            $this->head = $new_node;
            $this->tail = $new_node;
        }else{
            $this->tail->next = $new_node;
            $this->tail= $new_node;
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
        $current = $this->head;

        while($current->next !== null){
            $pre = $pre->next;
            $current = $current->next;
        }

        $this->tail = $pre;
        $this->tail->next = null;
    }

    public function get($index){

        if($index == 0 || $index > $this->length){
            return null;
        }

        $temp = $this->head;

        for($i = 0; $i < $index; $i++){
            $temp = $temp->next;
        }

        return $temp->value;
    }

    public function print(){
        $temp = $this->head;

        while($temp !== null){
            echo "$temp->value ,";
            $temp = $temp->next;
        } 
    }
}

$list = new LinkList([1,2,3,4,5,6,7,9,35]);
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
echo "<br>";
echo $list->get(3);
echo "<br>";