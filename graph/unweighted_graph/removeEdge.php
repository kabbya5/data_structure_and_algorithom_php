<?php 

class RemoveEdge{
    private $adjacency_list = [];
    

    public function addVertex($vertex){
        if(!array_key_exists($vertex,$this->adjacency_list)){
            $this->adjacency_list[$vertex]  = [];
        }
    }

    public function addEdge($vertex1,$vertex2){
        $this->addVertex($vertex1);
        $this->addVertex($vertex2);

        $this->adjacency_list[$vertex1][] = $vertex2;
        $this->adjacency_list[$vertex2][] = $vertex1;
    }

    public function removeEdge($vertex1, $vertex2){
        if (isset($this->adjacency_list[$vertex1])) {
            $this->adjacency_list[$vertex1] = array_values(array_filter(
                $this->adjacency_list[$vertex1],
                function ($v) use ($vertex2) {
                    return $v !== $vertex2;
                }
            ));
        }

        if (isset($this->adjacency_list[$vertex2])) {
            $this->adjacency_list[$vertex2] = array_values(array_filter(
                $this->adjacency_list[$vertex2],
                function ($v) use ($vertex1) {
                    return $v !== $vertex1;
                }
            ));
        }
    }

    public function removeVertex($vertex) {
        if (isset($this->adjacency_list[$vertex])) {
            foreach ($this->adjacency_list[$vertex] as $neighbor) {
                $this->removeEdge($vertex, $neighbor);
            }
            unset($this->adjacency_list[$vertex]);
        }
    }


    public function printGraph(){
        foreach($this->adjacency_list as $vertex => $neighbors){
            echo "$vertex -> ". implode(', ', $neighbors) . "\n";
        }
    }
}

$graph = new RemoveEdge();
$graph->addEdge("A", "B");
$graph->addEdge("A", "C");
$graph->addEdge("B", "D");
$graph->addEdge("C", "D");
$graph->addEdge("C", "E");

echo "Adjacency List:" . PHP_EOL;
$graph->printGraph();

$graph->removeEdge("A", "C");

echo PHP_EOL . "After Removing Edge:" . PHP_EOL;
$graph->printGraph();