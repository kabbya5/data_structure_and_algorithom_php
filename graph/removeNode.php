<?php 

class Graph{
   private $adj_list;

   public function __construct(){
        $this->adj_list = [];
   }

   public function printGraph(){
        foreach($this->adj_list as $vertex => $neighbors){
            echo $vertex . ":" . implode(",", $neighbors) . "<br>";
        }
   }

   public function addVertex($vertex){
        if(!isset($this->adj_list[$vertex])){
            $this->adj_list[$vertex] = [];
            return true;
        }
        return false;
   }

   public function addEdge($v1, $v2){
        if(array_key_exists($v1, $this->adj_list) && array_key_exists($v2, $this->adj_list)){
            $this->adj_list[$v1][] = $v2;
            $this->adj_list[$v2][] = $v1;
            return true;
        }

        return false;
   }

   public function removeEdge($v1, $v2){
        if(isset($this->adj_list[$v1]) && isset($this->adj_list[$v2])){
            $this->adj_list[$v1] = array_diff($this->adj_list[$v1], [$v2]);
            $this->adj_list[$v2] = array_diff($this->adj_list[$v2], [$v1]);
            return true;
        }
        return false;
   }
}

$graph = new Graph();

$graph->addVertex("A");
$graph->addVertex("B");
$graph->addVertex("C");
$graph->addVertex("D");

$graph->addEdge("A", "B");
$graph->addEdge("B", "C");
$graph->addEdge("C", "A");

$graph->printGraph();

$graph->removeEdge("A", "B");
$graph->removeEdge("A", "D");

// Print the graph
$graph->printGraph();