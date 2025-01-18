<?php 

class WeightedGraph{
    private $adjaency_list = [];


    public function addVertex($vertex){
        if(!array_key_exists($vertex,$this->adjaency_list)){
            $this->adjaency_list[$vertex]  = [];
        }
    }

    public function addEdge($from, $to, $weight){
        if(!array_key_exists($from,$this->adjaency_list)){
            $this->addVertex($from);
        }

        if(!isset($this->adjaency_list[$to])){
            $this->addVertex($to);
        }

        $this->adjaency_list[$from][$to] = $weight;
    }

    public function display(){
        foreach($this->adjaency_list as $vertex => $edges){
            echo "$vertex -> ";
            foreach($edges as $neighbor => $weight){
                echo "($neighbor, $weight) \n";
            }
        }
    }
}

$graph = new WeightedGraph();
$graph->addEdge('A', 'B', 4);
$graph->addEdge('A', 'C', 2);
$graph->addEdge('B', 'C', 3);
$graph->addEdge('B', 'D', 1);
$graph->addEdge('C', 'D', 5);

$graph->display();