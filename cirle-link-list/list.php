<?php 

class node{
    public $val;
    public $next;

    public function __construct($val)
    {
        $this->val = $val;
        $this->next = null;
    }
}

class CircleLinkedList{
    private $head;
    private $tail;
    private $length;

    public function __construct(array $array = []){
        if(count($array) > 0){
            $this->insert($array);
        }
    }

    public function insert(array $array){
        foreach($array as $arr){
            $new_node  = new Node($arr);
            if($this->head == null){
                $this->head = $new_node;
                $this->tail = $new_node;
                $this->tail->next = $this->head;
            }else{
                $this->tail->next = $new_node;
                $this->tail = $new_node;
                $this->tail->next = $this->head;
            }

            $this->length += 1;
        }
    }

    public function print(){
        $temp = $this->head;
        
        do{
            echo "$temp->val ";
            $temp = $temp->next;
        }while($temp !== $this->head);

    }
}

$cll = new CircleLinkedList();
$cll->insert([10,20,40,30]);

echo "Circular Linked List: ";
$cll->print();