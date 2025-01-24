<?php 

class WeightedGraph {
    public $adjacency_list = [];

    public function addEdge($from, $to, $weight) {
        if (!array_key_exists($from, $this->adjacency_list)) {
            $this->adjacency_list[$from] = [];
        }

        if (!array_key_exists($to, $this->adjacency_list)) {
            $this->adjacency_list[$to] = [];
        }

        $this->adjacency_list[$from][$to] = $weight;
        $this->adjacency_list[$to][$from] = $weight;
    }

    public function dijkstra($start) {
        $distances = [];
        $visited = [];
        $priorityQueue = [];

        // Initialize all distances to infinity
        foreach ($this->adjacency_list as $node => $edges) {
            $distances[$node] = PHP_INT_MAX;
        }

        // Set the distance of the start node to 0
        $distances[$start] = 0;

        // Initialize the priority queue with the start node
        $priorityQueue[] = [$start, 0];

        while (!empty($priorityQueue)) {
            // Sort the queue by distance (min-heap)
            usort($priorityQueue, function ($a, $b) {
                return $a[1] <=> $b[1];
            });

            // Get the node with the smallest distance
            [$current, $currentDistance] = array_shift($priorityQueue);

            // Skip if the node has already been visited
            if (isset($visited[$current])) {
                continue;
            }
            $visited[$current] = true;

            // Update the distances to the neighbors
            foreach ($this->adjacency_list[$current] as $neighbor => $weight) {
                $newDistance = $currentDistance + $weight;
                if ($newDistance < $distances[$neighbor]) {
                    $distances[$neighbor] = $newDistance;
                    $priorityQueue[] = [$neighbor, $newDistance];
                }
            }
        }

        return $distances;
    }
}

$graph = new WeightedGraph();

// Add edges
$graph->addEdge('A', 'B', 4);
$graph->addEdge('A', 'D', 1);
$graph->addEdge('B', 'C', 2);
$graph->addEdge('B', 'E', 5);
$graph->addEdge('C', 'E', 1);
$graph->addEdge('D', 'E', 3);

// Run Dijkstra's algorithm from node 'C'
$distances = $graph->dijkstra('C');

// Output the shortest distances
// echo "Shortest distances from C:\n"; // Corrected message
// foreach ($distances as $node => $distance) {
//     echo "$node: " . ($distance === PHP_INT_MAX ? "Infinity" : $distance) . "\n";
// }

echo "Shortest distance from C to D: " . ($distances['D'] === PHP_INT_MAX ? "Infinity" : $distances['D']) . "\n";
