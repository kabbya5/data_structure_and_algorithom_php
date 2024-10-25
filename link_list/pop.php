<?php 

class Node{
<<<<<<< HEAD

    public $value;
    public $next;

    function __construct($value){
=======
    public $value;
    public $next;

    public function __construct($value){
>>>>>>> tree
        $this->value = $value;
        $this->next = null;
    }
}

class LinkList{
    private $head;
<<<<<<< HEAD
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

=======
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
>>>>>>> tree
        if($this->head == null){
            $this->head = $new_node;
            $this->tail = $new_node;
        }else{
<<<<<<< HEAD
            $new_node->next = $this->head;
            $this->head = $new_node;
=======
            $this->tail->next = $new_node;
            $this->tail = $new_node;
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
>>>>>>> tree
        }

        $this->length += 1;
    }

    public function pop(){
<<<<<<< HEAD
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

=======
        if($this->length == 0){
            return null;
        }

        $pre = $this->head;
        $temp = $this->head;

        while($temp->next){
            $pre = $temp;
            $temp = $temp->next;
        }

        $this->tail = $pre;
        $this->tail->next = null;

        if($this->length == 0){
            $this->head = null;
            $this->tail = null;
        }

        return $pre->value;
>>>>>>> tree
    }

    public function print(){
        $temp = $this->head;

        while($temp !== null){
<<<<<<< HEAD
            echo " $temp->value \n";
=======
            echo "$temp->value ,";
>>>>>>> tree
            $temp = $temp->next;
        }
    }
}

<<<<<<< HEAD
$list = new LinkList([3,4,5,6,7,3,5,78,5]);
$list->print();
$list->pop();
echo "<br>";
$list->print();
$list->prepend(3);
$list->prepend(2);
$list->prepend(1);
echo "<br>";
=======
$list = new LinkList(1);
$list->print();
echo "<br>";
$list->append(10);
$list->print();
echo "<br>";
$list->prepend(20);
$list->print();
echo "<br>";
$list->pop();
>>>>>>> tree
$list->print();