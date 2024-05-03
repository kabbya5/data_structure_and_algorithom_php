<?php 
class Node 
{
    public $next;
    public $value;
    
    function __construct($value)
    {
        $this->value = $value;
        $this->next = null;
    }
}

class LinkList {
    private $head;
    private $tail;
    private $count;

    public function __construct(array $values = null) {
        $this->head = null;
        $this->tail = null;
        $this->count = 0;
        
        if($values) {
            foreach($values as $value) {
                $new_node = new Node($value);
                if($this->head == null) {
                    $this->head = $new_node;
                    $current = $this->head;
                } else {
                    $current->next = $new_node;
                    $current = $current->next;
                }
                
                $this->count += 1;
            }
        }
    }

    public function printList() {
        $head = $this->head;

        while($head !== null) {
            echo $head->value . " \n";
            $head = $head->next;
        }
    }
}

$list = new LinkList([1, 3, 45, 43, 123, 4]);
$list->printList();