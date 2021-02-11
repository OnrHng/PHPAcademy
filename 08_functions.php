<?php

// Function which prints "Hello I am Zura"
function hello() {
    echo "I am here!".'<br>';
}
hello();
hello();

// Function with argument
function hello2($name) {
    echo "I am here! $name".'<br>';
}

hello2("Onur");


// Create sum of two functions
function sum($num1, $num2){
    return $num1 + $num2;
}

echo sum(5,5).'<br>';

// Create function to sum all numbers using ...$nums
function sumNumbers(...$nums){
    $sum=0;
    foreach ($nums as $num){
        $sum += $num;
    }
    return $sum;
}

echo sumNumbers(1,2,3,4,5).'<br>';

// Arrow functions
function reduceArr(...$nums){
    return array_reduce($nums, fn($carry, $n) =>  $carry + $n);
}
echo reduceArr(1,2,3,4,5);
