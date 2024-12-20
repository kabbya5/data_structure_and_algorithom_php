## Heap as a Data Structure
In the context of data structures, a heap is a specialized binary tree that satisfies the heap property
### Max-Heap: 
The value of each parent node is greater than or equal to the values of its child nodes.
### Min-Heap: 
The value of each parent node is less than or equal to the values of its child nodes.
### Max-Heap 
Tree Max Heap
![tree max-heap](https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTee1LzwJqFHUhF8xocYhzjpFNgmki91R0paA&s)

### Linked List
```php
<?php 

class EmptyHeadException extends Exception{
    private $errorCode;

    public function __construct($message, $errorCode, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errorCode = $errorCode;
    }

    public function getErrorCode()
    {
        return $this->errorCode;
    }
}

class node{
    public $value;
    public $next;

    public function __construct($value){
        $this->value = $value;
        $this->next = null;
    }
}

class LikedListMaxHeap{
    private $head;
    private $tail;
    private $length;

    public function __construct($value){
        $new_node = new Node($value);
        $this->head = $new_node;
        $this->tail = $new_node;
        $this->length = 1;
    }

    public function insert($value){
        $new_node = new Node($value);
        $this->length += 1;

        if($this->head === null){
            $this->head = $new_node;
            $this->tail = $new_node;
        }else{
            $prev = null;
            $current = $this->head;

            while($current !== null && $current->value > $value){
                $prev = $current;
                $current = $current->next;
            }

            if($prev == null){
                $new_node->next = $this->head;
                $this->head = $new_node;
            }else{
                $new_node->next = $current;
                $prev->next = $new_node;
                $this->head = $prev;
            }
        }
    }

    public function isEmpty(){
        return $this->head === null;
    }

    public function unset($value){
        if($this->isEmpty()){
            throw new EmptyHeadException("Head is empty", '404');
        }
        $prev = null;
        $current = $this->head;

        while($current !== null && $current->value !== $value){
            $prev = $current;
            $current = $current->next;
        }

        if($prev == null){
            $this->head = $current->next;
        }else{
            $prev->next = $current->next;
            $this->head = $prev;
        }

        $this->length--;
    }

    public function extract(){
        if($this->isEmpty()){
            throw new EmptyHeadException("Head is empty", '404');
        }
        $maxValue = $this->head->value;
        $this->head = $this->head->next;

        $this->length--;

        return $maxValue;
        
    }

    public function printHeap() {
        $current = $this->head;
        while ($current !== null) {
            echo $current->value . " ";
            $current = $current->next;
        }
        echo "<br>";
    }
}

$maxHeap = new LikedListMaxHeap(5);
$maxHeap->insert(10);
$maxHeap->insert(20);
$maxHeap->insert(5);
$maxHeap->insert(30);

echo "Max Heap (linked list): <br>";
$maxHeap->printHeap();

echo "Extracted Max: <br>" . $maxHeap->extract() . "<br>";

echo "Heap After Extraction: <br>";
$maxHeap->printHeap();

$maxHeap->unset(5);

echo "Max Heap after unset: ";
$maxHeap->printHeap();
```


