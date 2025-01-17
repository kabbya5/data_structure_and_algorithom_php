<?php 

class UnweightedGraph{
    private $adjacency_list = [];
    private $node = 0;

    public function addVertex($vertex){
        if(!array_key_exists($vertex,$this->adjacency_list)){
            $this->adjacency_list[$vertex]  = [];
            $this->node += 1;
        }
    }

    public function addEdge($vertex1, $vertex2){
        if(!array_key_exists($vertex1,$this->adjacency_list)){
            $this->adjacency_list[$vertex1] = [];
            $this->node += 1;
        }

        if(!array_key_exists($vertex2,$this->adjacency_list)){
            $this->adjacency_list[$vertex2]  = [];
        }

        $this->adjacency_list[$vertex1][]  = $vertex2;
        $this->adjacency_list[$vertex2][]  = $vertex1;

    }

    public function print_graph(){
        foreach($this->adjacency_list as $vertex => $neighbors){
            echo "$vertex ->" . implode(', ',$neighbors) . "\n";
        }
    }
}

$graph = new UnweightedGraph();
$graph->addEdge("A", "B");
$graph->addEdge("A", "C");
$graph->addEdge("B", "D");
$graph->addEdge("C", "D");
$graph->addEdge("C", "E");

echo "Adjacency List:" . PHP_EOL;
$graph->print_graph();