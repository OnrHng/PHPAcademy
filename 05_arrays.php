<?php

// Create array
$fruits = ["Banana", "CarryBerries"];
$fruits = array('Apple', 'Orange', 'Banana');

// Print the whole array
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// Get element by index
echo $fruits[0].'<br>';

// Set element by index
$fruits[0] = 'Peach';
var_dump($fruits);
echo '<br>';
// Check if array has element at index 2
$isSet = isset($fruits[1]);
echo $isSet;

// Append element
$fruits[] = 'CarryBerries';
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// Print the length of the array
echo count($fruits).'<br>';

// Add element at the end of the array
array_push($fruits, 'some fruits');
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// Remove element from the end of the array
array_pop($fruits);
echo '<pre>';
var_dump($fruits);
echo '</pre>';

// Add element at the beginning of the array
array_unshift($fruits, 'first');
echo '<pre>';
var_dump($fruits);
echo '</pre>';


// Remove element from the beginning of the array
array_shift($fruits);
echo '<pre>';
var_dump($fruits);
echo '</pre>';


// Split the string into an array
$string = "Banana, Apple, Peach";
$splittedFruits = explode(",", $string);
echo '<pre>';
var_dump($splittedFruits);
echo '</pre>';


// Combine array elements into string
// toString mehtod in PHP
echo implode(",", $splittedFruits).'<br>';


// Check if element exist in the array
var_dump(in_array(" Apple", $splittedFruits)).'<br>';

// Search element index in the array
var_dump(array_search(" Apple", $splittedFruits)).'<br>';


// Merge two arrays
$vegetables = array('Potato', 'Cucumnber', ...$splittedFruits);
// or
$anotherVegi = array_merge($vegetables, $fruits);

echo '<pre>';
var_dump($vegetables);
echo '</pre>';


echo '<pre>';
var_dump($anotherVegi);
echo '</pre>';

// Sorting of array (Reverse order also)
echo "BEFORE SORTING";
echo '<pre>';
var_dump($fruits);
echo '</pre>';
echo "AFTER SORTING";
sort($fruits);
echo '<pre>';
var_dump($fruits);
echo '</pre>';


// https://www.php.net/manual/en/ref.array.php

// ============================================
// Associative arrays (Iliskili arrays)
// ============================================
// java daki hashmap gibi veya js deki object gibi dusunebilirsin
// key - value pairs


// Create an associative array
$person = [
    'name' => 'Onur',
    'surname' => 'Han',
    'age' => 3,
    'hobbies' => ['Sport','Garten']
];
echo '<pre>';
print_r($person);
echo '</pre>';


// Get element by key
echo $person['name'].'<br>';

// Set element by key
$person['languages'] = ['English', 'German'];
echo '<pre>';
print_r($person);
echo '</pre>';

// Null coalescing assignment operator. Since PHP 7.4
$person['address'] ??= 'unknown'; // that makes is there isnot a address key in the arr, define it and initialize into
// same way under
//$person['address'] = $person['address'] ?? 'unknown';

echo '<pre>';
print_r($person);
echo '</pre>';


// Check if array has specific key

// Print the keys of the array
print_r(array_keys($person)).'<br>';
echo '<br>';

// Print the values of the array
print_r(array_values($person));

// Sorting associative arrays by values, by keys
ksort($person);
echo '<pre>';
print_r($person);
echo '</pre>';

asort($person);
echo '<pre>';
print_r($person);
echo '</pre>';


// Two dimensional arrays
$todos = [
  ['title' => 'Task1', 'completed' => false],
  ['title' => 'Task2', 'completed' => true],
  ['title' => 'Task3', 'completed' => false],

];

echo '<pre>';
print_r($todos);
echo '</pre>';