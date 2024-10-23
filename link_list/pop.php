<?php 

class Node{

    public $value;
    public $next;

    function __construct($value){
        $this->value = $value;
        $this->next = null;
    }
}

class LinkList{
    private $head;
    private $length;
    private $tail;

    public function __construct(array $nums)
    {
        foreach($nums as $num){
            $this->insert($num);
        }
    }

    public function insert($value){
        if($value){
            $new_node = new Node($value);

            if($this->head == null){
                $this->head = $new_node;
                $this->tail = $new_node;
            }else{
                $this->tail->next = $new_node;
                $this->tail = $new_node;
            }

            $this->length += 1;

            return true;
        }
        
        return false;

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

    public function pop(){
        if($this->head == null){
            return false;
        }

        $temp = $this->head;
        $this->head = $this->head->next;
        $temp->next = null;
        $this->length -= 1;

        if($this->length == 0){
            $this->tail = null;
        }

    }

    public function print(){
        $temp = $this->head;

        while($temp !== null){
            echo " $temp->value \n";
            $temp = $temp->next;
        }
    }
}

$list = new LinkList([3,4,5,6,7,3,5,78,5]);
$list->print();
$list->pop();
echo "<br>";
$list->print();
$list->prepend(3);
$list->prepend(2);
$list->prepend(1);
echo "<br>";
$list->print();