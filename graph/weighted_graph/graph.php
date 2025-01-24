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
$graph->addEdge('0', '1', 3);
$graph->addEdge('0', '8', 4);
$graph->addEdge('0', '3', 2);
$graph->addEdge('1', '7', 4);
$graph->addEdge('7', '2', 2);
$graph->addEdge('2', '5', 1);
$graph->addEdge('5', '6', 8);
$graph->addEdge('2', '3', 6);
$graph->addEdge('3', '4', 1);
$graph->addEdge('4', '8', 8);

$graph->display();