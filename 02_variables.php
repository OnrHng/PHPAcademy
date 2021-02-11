<?php

// What is a variable

// Variable types
    // has any types , typelos language, variable are dynamic type
// Declare variables
    // Use $ sign to define it. Musst begin with letter
//  String integer float boolean null array object and resource
    // are type of variable.
$name = "Onur";
$age = 30;

$ismale = true;
$height = 1.92;
$salary = null;

// Print the variables. Explain what is concatenation
echo $name.'<br>'; // to concation we can use "."
echo $age.' '.$height." cm".'<br>';
// Print types of the variables
echo gettype($ismale).'<br>';
echo gettype($height).'<br>';
echo gettype($age).'<br>';
// Print the whole variable
var_dump($name, $age, $ismale, $height, $salary).'<br>';
// Change the value of the variable
$name = false; //you can change the string variable to boolean or whatever you want
// Print type of the variable
var_dump($name);

// Variable checking functions
is_string($name); // false
is_int($age); // true
// Check if variable is defined
isset($name); // true
isset($address); // false

// Constants
define('PI', 3.14); // with define func we can define a constants that cannot be changed
echo PI.'<br>';

// Using PHP built-in constants
echo SORT_ASC.'<br>';
echo PHP_INT_MAX;