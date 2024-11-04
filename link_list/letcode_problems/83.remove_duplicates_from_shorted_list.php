<?php 

class Node{
    public $val;
    public $next;

    public function __construct($val)
    {
        $this->val = $val;
        $this->next = null;
    }
}

class LinkedList{

    private $head;
    private $tail;
    private $length;

    public function __construct( array $values = []){
        if(count($values) > 0){
            foreach($values as $val){
                $this->insert($val);
            }
        }
    }

    public function insert($val){
        $new_node = new Node($val);
        if($this->head == null){
            $this->head = $new_node;
            $this->tail = $new_node;
        }else{
            $this->tail->next = $new_node;
            $this->tail = $new_node;
        }

        $this->length++;
    }

    public function removeDouplicate(){
        $temp = $this->head;

        while($temp && $temp->next){
            if($temp->val == $temp->next->val){
                $temp->next = $temp->next->next;
            }else{
                $temp = $temp->next;
            }
        }

        return $this->head;
    }

    public function print(){
        $temp = $this->head;
        while($temp != null){
            echo "$temp->val ";
            $temp = $temp->next;
        }
    }
}

$list = new LinkedList([1,1,1,1,2,2,2,3,3,3,4,5,6,7,8,8]);
$list->print();
echo "<br>";
$list->removeDouplicate();

$list->print();