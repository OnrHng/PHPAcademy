<?php

// while
$counter = 0;
//while ($counter < 10){
//    echo $counter;
//    $counter++;
//}
// Loop with $counter

// do - while
do {
    //echo $counter;
} while ($counter != 0);

// for

for ($i = 0; $i < 10; $i++){
    echo $i.'<br>';
}

// foreach
$fruits = ['Banana', 'Orange', 'Apple'];
foreach ($fruits as $i => $fruit) {
    echo $i.' '.$fruit.'<br>';
}

// Iterate Over associative array.
// Create an associative array
$person = [
    'name' => 'Onur',
    'surname' => 'Han',
    'age' => 3,
    'hobby' => 'Sport'
];

foreach ($person as $key => $value) {
    echo $key.' = '.$value.'<br>';
}