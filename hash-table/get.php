<?php 

class HashTable{
    private $data;
    private $size;

    public function __construct($size = 20){
        $this->size = $size;
        $this->data = [];
    }

    private function hash($key){
        return crc32($key) % $this->size;
    }

    public function insert($key, $value){
        $index = $this->hash($key);
        if(!isset($this->data[$index][$key])){
            $this->data[$index] = [];
        }

        if(!isset($this->data[$index][$key])){
            $this->data[$index][$key]  = [];
        }

        $this->data[$index][$key][] = $value;
    }

    public function get($key){
        $index = $this->hash($key);
        $data = $this->data[$index][$key];

        echo "The data of {$key} is <br>";

        if(gettype($data) == 'array'){
            foreach($data as $d){
                echo "$d ";
            }
        }elseif($data){
            echo $data;
        }else{
            return null;
        }
    }
}

$hashTable = new HashTable();
$hashTable->insert("apple", "fruit");
$hashTable->insert("carrot", "vegetable");
$hashTable->insert("banana", "fruit");
$hashTable->insert("carrot", "fruit2");
$hashTable->get('carrot');