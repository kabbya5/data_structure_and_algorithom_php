<?php 

class Node{
    public $value;
    public $next;

    public function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
    }
}

class LinkList{
    private $head;
    private $tail;
    private $length  = 0;

    public function __construct(array $values = []){
        foreach($values as $value){
            if($value){
                $this->append($value);
            }
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
        
        if($this->count = 0){
            $this->head = $new_node;
            $this->tail = $new_node;
        }else{
            $new_node->next = $this->head;
            $this->head = $new_node;
        }

        $this->length += 1;
    }

    public function printList() {
        $current = $this->head;
        while($current !== null) {
            echo $current->value . " \n";
            $current = $current->next;
        }
    }
}

$list = new LinkList([1, 3, 45, 43, 123, 4]);
$list->printList();
echo "<br>";
$list->append(10);
$list->printList();
echo "<br>";
$list->prepend(20);
$list->printList();