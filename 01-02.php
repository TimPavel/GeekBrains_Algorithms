
<?php

function ShellSort($elements) {
    $k=0;
    $length = count($elements);
    $gap[0] = (int) ($length / 2);

     while($gap[$k] > 1) {
         $k++;
         $gap[$k]= (int)($gap[$k-1] / 2);
     }

     for($i = 0; $i <= $k; $i++){
         $step = $gap[$i];
            
         for($j = $step; $j < $length; $j++) {
             $temp = $elements[$j];
             $p = $j - $step;
             
             while($p >= 0 && $temp['price'] < $elements[$p]['price']) {
                 $elements[$p + $step] = $elements[$p];
                 $p = $p - $step;
             }
             
             $elements[$p + $step] = $temp;
         }
     }

     return $elements;
 }


// O(1 + N + N * 3N * 2N + 1) = O(2 + 2N + 6N3)