
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

    function __construct($value)
    {
        $new_node = new Node($value);
        $this->head = $new_node;
        $this->tail = $new_node;
        $this->length = 1;
    }

    function print(){
        $temp = $this->head;

        while($temp != null){
            echo $temp->value  . "\n";
            $temp = $temp->next;
        }
    }
}

$list = new LinkList(4);
$list->print();