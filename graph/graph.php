<?php 
class Grap{
    private $adj_list = [];
    private $length;

    public function construct(){
        $this->adj_list = [];
        $this->length  = 0;
    }

    public function addVertext($node){
        if(!array_key_exists($node, $this->adj_list)){
            $this->adj_list[$node]  = [];
            $this->length++;
            return true;
        }

        return false;
    }

    public function addEdage($node1, $node2){
        if(array_key_exists($node1, $this->adj_list) && array_key_exists($node2, $this->adj_list)){
            $this->adj_list[$node1][] = $node2;
            $this->adj_list[$node2][] = $node1;
        }
    }

    public function printGraph() {
        foreach ($this->adj_list as $vertex => $edges) {
            echo $vertex . " : " . implode(", ", $edges) . PHP_EOL;
        }
    }
}

$g = new Grap();

$g->addVertext(0);
$g->addVertext(1);
$g->addVertext(2);
$g->addVertext(3);
$g->addVertext(4);
$g->addVertext(5);
$g->addVertext(6);

$g->addEdage(3, 1);
$g->addEdage(3, 4);
$g->addEdage(4, 2);
$g->addEdage(4, 5);
$g->addEdage(1, 2);
$g->addEdage(1, 0);
$g->addEdage(0, 2);
$g->addEdage(6, 5);
$g->printGraph();

