<?php 
<<<<<<< HEAD

=======
>>>>>>> link-list
class Node{
    public $value;
    public $next;

<<<<<<< HEAD
    public function __construct($value){
=======
    public function  __construct($value){
>>>>>>> link-list
        $this->value = $value;
        $this->next = null;
    }
}

<<<<<<< HEAD
class LinkList{
=======
class LinkLIst{
>>>>>>> link-list
    private $head;
    private $tail;
    private $length;

    public function __construct(array $nums = null){
<<<<<<< HEAD
        foreach($nums as $num){
            $this->append($num);
        }
    }

    public function append($value){
=======
        if($nums){
            foreach($nums as $value){
                $this->insert($value);
            }
        }
    }

    public function insert(int $value){
>>>>>>> link-list
        $new_node = new Node($value);

        if($this->head == null){
            $this->head = $new_node;
            $this->tail = $new_node;
        }else{
            $this->tail->next = $new_node;
<<<<<<< HEAD
            $this->tail= $new_node;
=======
            $this->tail = $new_node;
>>>>>>> link-list
        }

        $this->length += 1;
    }

<<<<<<< HEAD
    public function prepend($value){
        $new_node = new Node($value);
        if($this->length == 0){
=======
    public function append(int $value){
        $new_node = new Node($value);
        if($this->head == null){
>>>>>>> link-list
            $this->head = $new_node;
            $this->tail = $new_node;
        }else{
            $new_node->next = $this->head;
            $this->head = $new_node;
        }

        $this->length += 1;
<<<<<<< HEAD
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
=======

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

>>>>>>> link-list
    }

    public function get($index){

<<<<<<< HEAD
        if($index == 0 || $index > $this->length){
=======
        if($index == 0 || $index > $this->length ){
>>>>>>> link-list
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
<<<<<<< HEAD
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
=======
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
>>>>>>> link-list
