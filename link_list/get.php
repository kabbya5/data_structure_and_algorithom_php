<?php 
class Node{
    public $value;
    public $next;

    public function  __construct($value){
        $this->value = $value;
        $this->next = null;
    }
}

class LinkLIst{
    private $head;
    private $tail;
    private $length;

    public function __construct(array $nums = null){
        if($nums){
            foreach($nums as $value){
                $this->insert($value);
            }
        }
    }

    public function insert(int $value){
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

    public function append(int $value){
        $new_node = new Node($value);
        if($this->head == null){
            $this->head = $new_node;
            $this->tail = $new_node;
        }else{
            $new_node->next = $this->head;
            $this->head = $new_node;
        }

        $this->length += 1;

        return true;
    }

    public function popFirst(){
        if($this->head == null){
            return false;
        }

        $temp = $this->head;
        $this->head = $temp->next;
        $temp->next = null;
        $this->length -= 1;

        if($this->length == 0){
            $this->tail == null;
        }

        return true;

    }

    public function get($index){

        if($index == 0 || $index > $this->length ){
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
$li->get(1);