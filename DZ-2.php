<?php

/*
	При прогоне массива состоящий из чисел и строк быстрее обрабатывалось форич ом
	числовой массив был до миллиона значений, строковый массив до 100 000 значений
*/


$arr[];

// перебор через foreach
foreach ($arr as $key => $value) {
	echo 'Ключ - '.$key.'. Значение - '. $value .PHP_EOL;
}  


// перебор массива с итератором
$obj = new ArrayObject ($arr);
$iter = $obj->getIterator();

while( $iter->valid() )
{
    echo 'Ключ - '.$iter->key() . '. Значение - ' . $iter->current() . PHP_EOL;
    $iter->next();
} 

