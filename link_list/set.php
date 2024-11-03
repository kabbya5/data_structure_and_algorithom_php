<?php 

class Node{
    public $val;
    public $next;

    public function __construct($val){
        $this->val = $val;
        $this->next = null;
    }
}

class LinkedList{
    private $head;
    private $tail;
    private $length;

    public function __construct($val){
        $new_node = new Node($val);
        $this->head = $new_node;
        $this->tail = $new_node;
        $this->length = 1;
    }

    public function append(array $nums){
        for($i = 0; $i < count($nums); $i++){
            $new_node = new Node($nums[$i]);
            $this->tail->next = $new_node;
            $this->tail = $new_node;
            $this->length += 1;
        }

        return true;
    }

    public function prepend($val){
        $new_node = new Node($val);
        $new_node->next = $this->head;
        $this->head = $new_node;
        $this->length += 1;
        return true;
    }

    public function popFirst(){
        if($this->length == 0){
            return false;
        }

        $current = $this->head;
        $this->head = $current->next;
        $this->length -= 1;

        if($this->length == 0) $this->tail = null;

        return $current->val;
    }

    public function pop(){
        if($this->length == 0) return false;
        $pre = $this->head;
        $temp  = $this->head;

        while($temp->next){
            $pre = $temp;
            $temp = $temp->next; 
        }

        $this->tail = $pre;
        $this->tail->next = null;

        $this->length -= 1;

        if($this->length == 0){
            $this->head = null;
            $this->tail = null;
        }

        return $temp->val;
    }

    public function get($index){
        if($index <= 0 || $index > $this->length){
            return false;
        }

        $temp = $this->head;

        for($i = 0; $i < $index; $i++){
            $temp = $temp->next;
        }

        return $temp->val;
    }

    public function set($index, $value){
        if($index <= 0 || $index > $this->length){
            return 'Undifind Index';
        }

        $temp = $this->head;

        for($i = 1; $i < $index; $i++){
            $temp = $temp->next;
        }

        $temp->val = $value;

        return true;
    }

    public function print(){
        $temp = $this->head;

        while($temp != null){
            echo $temp->val . ' ';
            $temp = $temp->next;
        }
    }
}

$linkedList = new LinkedList(10); 
$linkedList->append([20, 30, 40]);
$linkedList->prepend(5); 
echo "list" . "<br>";
$linkedList->print();
echo "<br>"; 

echo  "<br>";
$firstValue = $linkedList->popFirst();
echo "Popped first value: $firstValue\n"; // Output should be: Popped first value: 5
echo "list" . "<br>";

echo "list" . "<br>";
$linkedList->print();
echo "<br>"; 

echo  "<br>";
$lastValue = $linkedList->pop();
echo "Popped last value: $lastValue\n"; // Output should be: Popped last value: 40
echo  "<br>";
// Print the current state of the linked list again
$linkedList->print(); // Output should be: 10 -> 20 -> 30
echo  "<br>";
// Get and print a value at a specific index
$valueAtIndex = $linkedList->get(2);
echo  "<br>";
echo "Value at index 2: $valueAtIndex"; 
echo  "<br>";
$linkedList->set(1, 15); 
echo  "<br>";
$linkedList->print(); 