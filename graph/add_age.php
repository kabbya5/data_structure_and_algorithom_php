<?php 
class Node{
    public $next;
    public $val;

    public function __construct($val){
        $this->val = $val;
        $this->next = null;
    }
}

class LinkedList{
    private $head;
    private $tail;
    private $length;

    public function __construct()
    {
        $this->head = null;
        $this->length = 0;
    }

    public function insert($val){
        $new_node = new Node($val);

        if($this->head == null){
            $this->head = $new_node;
            $this->tail = $new_node;
        }else{
            $this->tail->next = $new_node;
            $this->tail = $new_node;
        }

        $this->length++;
    }

    public function display(){
        $current = $this->head;
        while($current !== null){
            echo $current->val . ' ';
            $current = $current->next;
        }
    }
}

class Graph{
    private $adj_list;

    public function __construct(){
        $this->adj_list = [];
    }

    public function addNode($node){
        if(!isset($this->adj_list[$node])){
            $this->adj_list[$node] = new LinkedList();
        }
    }

    public function addEdge($node1, $node2){
        $this->addNode($node1);
        $this->addNode($node2);

        $this->adj_list[$node1]->insert($node2);
        $this->adj_list[$node2]->insert($node1);
    }

    public function display() {
        foreach ($this->adj_list as $node => $list) {
            echo $node . ": ";
            $list->display();
            echo "\n";
        }
    }
}

$graph = new Graph();


$edges = [
    ['A', 'B'],
    ['A', 'D'],
    ['B', 'C'],
    ['B', 'D'],
    ['C', 'E'],
    ['D', 'E']
];

foreach ($edges as $edge) {
    $graph->addEdge($edge[0], $edge[1]);
}

$graph->display();