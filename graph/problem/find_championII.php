<?php 
class Graph{
    private $adjacencyList = [];

    public function __construct(){
        $this->adjacencyList = [];
    }

    public function addNode($node){
        if(!isset($this->adjacencyList[$node])){
            $this->adjacencyList[$node]  = [];
        }
    }

    public function addEdge($from, $to){
        $this->adjacencyList[$from][] = $to;
    }

    public function print(){
        foreach($this->adjacencyList as $node => $edge){
            echo $node . " -> " . implode(", ", $edge) . PHP_EOL;
        }
    }
}

$graph = new Graph();
$graph->addNode(0);
$graph->addNode(1);
$graph->addNode(2);

$graph->addEdge(0, 1);
$graph->addEdge(1, 2);

$graph->print();

function solution($n, $edges){
    $inDegree = array_fill(0, $n, 0);

    foreach($edges as $edge){
        $inDegree[$edge[1]]++;
    }

    $champion = - 1;

    $count = 0;

    foreach($inDegree as $index => $degree){
        if($degree == 0){
            $champion = $index;
            $count++;
        }
    }

    return $count === 1 ? $champion : -1;
}
$n = 4;
$edges = [[0, 2], [1, 3], [1, 2]];
echo "Champion: " . solution($n, $edges) . PHP_EOL;