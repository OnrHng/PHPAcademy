<?php

$age = 20;
$salary = 300000;

// Sample if

// Without circle braces
if ($age === 20) echo '1';

// Sample if-else
if ($age > 20) echo '1';
else echo '2';

echo '<hr>';

// Difference between == and ===
// == compare just values
// === compares value and type


// if AND
if ($age > 20 && $salary === 30000) echo 'right';

// if OR
if ($age > 20 || $salary === 300000) echo 'right'.'<br>';

// Ternary if
echo $age < 22 ? "Young" : "Old";

// Short ternary
$myAge = $age ?: 18;
echo '<br>'.$myAge;

// Null coalescing operator
$myName = isset($name) ? $name : 'Onur';
$myName = $name ?? 'Adam';
echo '<br>'.$myName;
echo '<hr>';
// switch
$userRole = 'dasdas';

switch ($userRole) {
    case 'admin':
        echo 'admin';
        break;
    case 'editor':
        echo 'editor';
        break;
    default:
        echo 'Invalid role';
}
