<?php 

Class UndirectedGraph{
    private $adjacency_list;

    public function __construct()
    {
        $this->adjacency_list = [];
    }

    public function addVertex($vertex){
        if(!array_key_exists($vertex, $this->adjacency_list)){
            $this->adjacency_list[$vertex] = [];
        }
    }

    public function addEdge($v1, $v2){
        if(!array_key_exists($v1, $this->adjacency_list)){
            $this->addVertex($v1);
        }

        if(!array_key_exists($v2, $this->adjacency_list)){
            $this->addVertex($v2);
        }

        $this->adjacency_list[$v1][]  = $v2;
        $this->adjacency_list[$v2][]  = $v1;
    }

    public function displayGraph(){
        foreach($this->adjacency_list as $vertex => $edges){
            echo $vertex ." -> " . implode(', ', $edges) . "\n";
        }
    }

    public function dfs($start, &$visited = []){
        if(isset($visited[$start])){
            return;
        }

        echo "$start \n";

        $visited[$start]  = true;

        foreach($this->adjacency_list[$start] as $neighbor){
            $this->dfs($neighbor, $visited);
        }
    }

    public function bfs($start){
        $visited = [];
        $queue = [$start];

        while(!empty($queue)){
            $vertex = array_shift($queue);

            if(!isset($visited[$vertex])){
                echo $vertex . ' ';
                $visited[$vertex]  = true;

                foreach($this->adjacency_list[$vertex] as $neighbor){
                    if(!isset($visited[$neighbor])){
                        $queue[] = $neighbor;
                    }
                }
            }
        }

    }
}

$graph = new UndirectedGraph();
$graph->addEdge("A", "B");
$graph->addEdge("A", "C");
$graph->addEdge("B", "D");
$graph->addEdge("C", "D");
$graph->addEdge("C", "E");

echo "Adjacency List:" . PHP_EOL;
$graph->displayGraph();

echo PHP_EOL . "DFS Traversal: ";
$graph->dfs("A");

echo PHP_EOL . "BFS Traversal: ";
$graph->bfs("A");