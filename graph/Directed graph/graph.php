<?php 
class DirectedGraph{
    private array $adjacencyList = [];

    public function addVertex(string $vartex): void{
        if(!isset($this->adjacencyList[$vartex])){
            $this->adjacencyList[$vartex] = [];
        }
    }

    public function addEdge(string $from, string $to): void{
        if(!isset($this->adjancecyList[$from])){
            $this->addVertex($from);
        }
        if(!isset($this->adjacencyList[$to])){
            $this->addVertex($to);
        }

        $this->adjacencyList[$from][] = $to;
    }

    public function printGraph(): void{
        foreach($this->adjacencyList as $vertex => $edges){
            echo "$vertex-> " . implode(', ', $edges) . "\n";
        }
    }

    public function dfs(string $start):void{
        $visited = [];
        $this->dfsHelper($start, $visited);
    }

    private function dfsHelper(string $vertex, array &$visited):void{
        if(isset($visited[$vertex])){
            return;
        }

        echo "$vertex ";

        $visited[$vertex] = true;

        foreach($this->adjacencyList[$vertex] as $neighbor){
            $this->dfsHelper($neighbor, $visited);
        }
    }
}

$graph = new DirectedGraph();
$graph->addVertex("A");
$graph->addVertex("B");
$graph->addVertex("C");

$graph->addEdge("A", "B");
$graph->addEdge("A", "C");
$graph->addEdge("B", "C");
$graph->addEdge("A", "D");

echo "Graph representation:\n";
$graph->printGraph();

echo "\nDFS from A: ";
$graph->dfs("A");
