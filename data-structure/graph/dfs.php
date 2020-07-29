<?php 
$graph = [];
$visited = [];
$vertexCout = 6;

for($i = 1; $i <= $vertexCout; $i++){
    $graph[$i] = array_fill(1, $vertexCout, 0);
    $visited[$i] = 0;
}

$graph[1][2] = $graph[2][1] = 1;
$graph[1][5] = $graph[5][1] = 1;
$graph[5][2] = $graph[2][5] = 1;
$graph[5][4] = $graph[4][5] = 1;
$graph[4][3] = $graph[3][4] = 1;
$graph[3][2] = $graph[2][3] = 1;
$graph[6][4] = $graph[4][6] = 1;


function DFS(array &$graph, int $start, array $visited): SplQueue{
    $stack = new SplStack;
    $path = new SplQueue;

    $stack->push($start);
    $visited[$start] = 1;

    while(! $stack->isEmpty()){
        $node = $stack->pop();
        $path->enqueue($node);

        foreach($graph[$node] as $key => $value){
            if(! $visited[$key] && $value == 1){
                $visited[$key] = 1;
                $stack->push($key);
            }
        }
    }

    return $path;
}

$path = DFS($graph, 1, $visited);

while(! $path->isEmpty()){
    echo $path->dequeue(). "\t";
}
echo "\n";