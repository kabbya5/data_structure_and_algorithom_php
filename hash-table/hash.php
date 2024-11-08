<?php 

class HashTable{
    private $buckets;
    private $size;

    public function __construct($size = 10){
        $this->size = $size;
        $this->buckets = array_fill(0,$size,[]);
    }

    private function hash($key){
        return crc32($key) % 10;
    }

    public function insert($key, $value){
        $index = $this->hash($key);
        $this->buckets[$index][$key] = $value;
    }

    public function display(){
        foreach($this->buckets as $index => $bucket){
            
            if($bucket){
                echo "Bucket $index <br>";
                print_r($bucket);
            }
            
        }
    }

}

$hashTable = new HashTable();
$hashTable->insert("apple", "fruit");
$hashTable->insert("carrot", "vegetable");
$hashTable->insert("banana", "fruit");
$hashTable->insert("carrot", "fruit2");
$hashTable->display();