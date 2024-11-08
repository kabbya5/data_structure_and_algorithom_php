<?php 

class HashTable{
    private $data;


    public function __construct($size = 10)
    {
        $this->data = array_fill(0, $size, null);
    }

    private function hash($key){
        $hash = 0; 
        $key_lenthg = strlen($key);
        for($i  = 0; $i < $key_lenthg; $i++){
            $hash = ($hash + ord($key[$i]) * 23) % count($this->data);
        }

        return $hash;
    }

    public function set($key,$value){
        $index = $this->hash($key);
        if($this->data[$index] == null){
            $this->data[$index]  == [];
        }

        $this->data[$index][] = [$key, $value];
    }

    public function getItem($key){
        $index = $this->hash($key);

        if($this->data[$index]  !== null){
            foreach($this->data[$index] as $pair){
                if($pair[0] === $key){
                    return $pair[1];
                }
            }
        }

        return null;
    }

    public function keys(){
        $keys = [];
        foreach($this->data as $bucket){
            if($bucket !== null){
                foreach($bucket as $pair){
                    $keys[] = $pair[0];
                }
            }
        }

        return $keys;
    }

    public function print(){
        foreach($this->data as $index => $val){
            echo "index {$index}: ";
            print_r($val);
            echo "<br>";
        }
    }

    public function remove($key){
       $index = $this->hash($key);

       if($this->data[$index] !== null){
            foreach($this->data[$index] as $i => $pair){
                if($pair[0] == $key){
                    unset($this->data[$index][$i]);
                    $this->data[$index] = array_values($this->data[$index]);
                    return true;
                }
            }
       }
       return false;
    }
}

$hashTable = new HashTable();
$hashTable->set('bolts', 1400);
$hashTable->set('washers', 50);
$hashTable->set('lumber', 70);

echo $hashTable->getItem('bolts') . "<br>";  
echo $hashTable->getItem('lumber') . "<br>";   

$keys = $hashTable->keys();
echo "Keys: " . implode(", ", $keys) . "<br>";  

$hashTable->print();

$hashTable->remove('washers');
$hashTable->print();