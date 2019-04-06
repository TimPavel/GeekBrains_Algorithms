
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

//1. Получить число шагов для заданного алгоритма.

// 1 + 1 + 1 + 2A + N * 3N * 2N + 1


//2. Вычислить сложность алгоритма.

// не могу вычислить поэтому подсмотрел, что в худшем случае это - O(N^2)


 $arr = [32,95,16,82,24,66,35,19,75,54,40,43,93,68];

 print_r(ShellSort($arr));