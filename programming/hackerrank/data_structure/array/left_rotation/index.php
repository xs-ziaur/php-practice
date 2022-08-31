<?php

/**
 * Dynamic Array Solution
 *
 * @param int $n
 * @param array $queries
 * @return void
 */
function rotateLeft($n, $d, $arr) {
    // Write your code here
   while ($d > 0) {
        $val = $arr[0];
        $i = 0;
        while ($i < $n) { 
            if ( $i == $n - 1 ) {
                $arr[$i] = $val;
            } 
            else {
                $arr[$i] = $arr[$i+1];
            }
            $i++;
        }
    $d--;
   }

   return $arr;
}



$fptr = fopen("output.txt", "w");

$file = fopen("input.txt", "r");

$line = fgets($file);
$first_line_input = explode(' ', $line);

$n = intval($first_line_input[0]);
$d = intval($first_line_input[1]);
$arr = array();

while (!feof($file)) {
    $arr = explode( ' ', fgets( $file ) );
}

$result = rotateLeft($n, $d, $arr);

fwrite($fptr, print_r( $result, true ) );

fclose($fptr);
