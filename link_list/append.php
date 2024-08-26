<?php 
class Node {
    public $value;
    public $next;

    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }
}

class LinkList {
    private $head;
    private $count;
    private $tail;

    function __construct($values = null) {
        $this->head = null;
        $this->count = 0;

        if($values) {
            foreach($values as $value) {
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

        $this->count += 1;
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
$list->append(10);
$list->printList();