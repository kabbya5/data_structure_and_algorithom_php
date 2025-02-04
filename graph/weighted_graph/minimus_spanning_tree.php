<?php 

class MinimumSpanningTree{
    private $adjacency_list;

    public function __construct(){
        $this->adjacency_list = [];
    }

    public function addVertex($vertex){
        if(!array_key_exists($vertex,$this->adjacency_list)){
            $this->adjacency_list[$vertex] = [];
        }
    }

    public function addEdge($vertex, $edge, $weight){
        $this->addVertex($vertex);
        $this->addVertex($edge);

        $this->adjacency_list[$vertex][$edge] = $weight;
        $this->adjacency_list[$edge][$vertex] = $weight;
    }

    public function removeEdge($vertex, $edge){
        if(array_key_exists($vertex, $this->adjacency_list)){
            unset($this->adjacency_list[$vertex][$edge]);
        }

        if(isset($this->adjacency_list[$edge][$vertex])){
            unset($this->adjacency_list[$edge][$vertex]);
        }
    }

    public function removeVertex($vertex){
        if(isset($this->adjacency_list[$vertex])){
            foreach($this->adjacency_list[$vertex] as $neighbor => $weight){
                unset($this->adjacency_list[$neighbor][$vertex]);
            }
            unset($this->adjacency_list[$vertex]);
        }
    }

    public function getNeighbors($vertex){
        return isset($this->adjacency_list[$vertex]) ? array_keys($this->adjacency_list[$vertex]) : [];
    }


    public function printGraph(){
        foreach($this->adjacency_list as $vertex => $edge){
            echo "$vertex -> "; 

            foreach($edge as $neighbor => $weight){
                echo "(" . $neighbor . "," . $weight. ")";
            }

            echo "\n";
        }
    }

    public function getEdge($vertex, $edge) {
        return isset($this->adjacency_list[$vertex][$edge]) ? $this->adjacency_list[$vertex][$edge] : null;
    }

    public function kruskalMST(){
        $edges = [];

        foreach($this->adjacency_list as $vertex => $neighbors){
            foreach($neighbors as $neighbor => $weight){
                if($vertex < $neighbor){
                    $edges[] = [$vertex, $neighbor, $weight];
                }
            }
        }

        usort($edges, function($a, $b){
            return $a[2] - $b[2];
        });

        $parent = [];
        $rank = [];

        foreach($this->adjacency_list as $vertex => $neighbors){
            $parent[$vertex] = $vertex;
            $rank[$vertex] = 0;
        }

        function find($parent, $node){
            if($parent[$node] !== $node){
                $parent[$node] = find($parent, $parent[$node]);
            }

            return $parent[$node];
        }

        function union(&$parent, &$rank, $node1, $node2){
            $root1 = find($parent, $node1);
            $root2 = find($parent, $node2);

            if($root1 !== $root2){
                if($rank[$root1] > $rank[$root2]){
                    $parent[$root2]  = $root1;
                }elseif($rank[$root1] < $rank[$root2]){
                    $parent[$root1]  = $root2;
                }else{
                    $parent[$root2]  = $root1;
                    $rank[$root1]++;
                }
            }
        }

        $mst = [];
        foreach ($edges as $edge) {
            list($u, $v, $weight) = $edge;
            if (find($parent, $u) !== find($parent, $v)) {
                $mst[] = $edge;
                union($parent, $rank, $u, $v);
            }
        }
    
        return $mst;
    }
}

$graph = new MinimumSpanningTree();
$graph->addEdge("A", "B", 5);
$graph->addEdge("A", "C", 3);
$graph->addEdge("B", "C", 2);
$graph->addEdge("B", "D", 4);
print_r($graph->kruskalMST());
echo "\n Edge weight between A and B: " . $graph->getEdge("A", "B");
echo "\n Edge weight between B and D: " . $graph->getEdge("B", "D");
echo "\n Edge weight between A and D: " . ($graph->getEdge("A", "D") ?? "No edge");

echo "Initial Graph:\n";
$graph->printGraph();

$graph->removeEdge("A", "B");
echo "\n Graph after removing edge A-B:\n";
$graph->printGraph();


echo "\n Neighbors of B: ";
print_r($graph->getNeighbors("B"));

$graph->removeVertex("C");
echo "\n Graph after removing vertex C:\n";
$graph->printGraph();

