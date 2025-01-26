<?php 
class WeightedGraph{
    private $adjacency_list;

    public function __construct(){
        $this->adjacency_list = [];
    }

    public function addVertex($vertex){
        if(!array_key_exists($vertex, $this->adjacency_list)){
            $this->adjacency_list[$vertex]  = [];
        }
    }

    public function addEdge($from, $to, $weight){
        $this->addVertex($from);
        $this->addVertex($to);

        $this->adjacency_list[$from][$to]  = $weight;
        $this->adjacency_list[$to][$from]  = $weight;
    }

    public function printGraph(){
        foreach($this->adjacency_list as $vertex => $neighbors){
            echo $vertex . " -> ";

            foreach($neighbors as $neighbor => $weight){
                echo "($neighbor, $weight) ";
            }

            "\n";
        }
    }

    public function getNeighbors($vertex){
        return $this->adjacency_list[$vertex] ?? [];
    }

    public function getEdges() {
        $edges = [];
        foreach ($this->adjacency_list as $vertex => $neighbors) {
            foreach ($neighbors as $neighbor => $weight) {
                $edges[] = [$vertex, $neighbor, $weight];
            }
        }
        return $edges;
    }

    public function bellmanFord($start) {
        $vertices = array_keys($this->adjacency_list);
        $numVertices = count($vertices);

        $distances = [];
        foreach ($vertices as $vertex) {
            $distances[$vertex] = INF;
        }
        $distances[$start] = 0;

        $edges = $this->getEdges();

        for ($i = 0; $i < $numVertices - 1; $i++) {
            foreach ($edges as $edge) {
                list($u, $v, $weight) = $edge;
                if ($distances[$u] != INF && $distances[$u] + $weight < $distances[$v]) {
                    $distances[$v] = $distances[$u] + $weight;
                }
            }
        }

        foreach ($edges as $edge) {
            list($u, $v, $weight) = $edge;
            if ($distances[$u] != INF && $distances[$u] + $weight < $distances[$v]) {
                echo "Graph contains negative weight cycle\n";
                return null;
            }
        }

        return $distances;
    }
}
$graph = new WeightedGraph();

// Add vertices and edges
$graph->addEdge('A', 'B', 3);
$graph->addEdge('A', 'C', 1);
$graph->addEdge('B', 'C', 7);
$graph->addEdge('B', 'D', 5);
$graph->addEdge('C', 'D', 2);

// Print the graph
$graph->printGraph();
"\n";
$neighbors = $graph->getNeighbors('C');

// Print the neighbors of vertex 'A'
echo "Neighbors of C: \n";
foreach ($neighbors as $neighbor => $weight) {
    echo "Neighbor: $neighbor, Weight: $weight\n";
}

$startVertex = 'C';
echo "\nRunning Bellman-Ford Algorithm from '$startVertex':\n";
$distances = $graph->bellmanFord($startVertex);

// Output the distances if no negative weight cycle was found
if ($distances !== null) {
    foreach ($distances as $vertex => $distance) {
        echo "Distance to $vertex: " . ($distance === INF ? "Infinity" : $distance) . "\n";
    }
}