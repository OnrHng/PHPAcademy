<?php

// Declaring numbers
$a = 10;
$b = 7;
// Arithmetic operations
echo $a + $b * $a .'<br>'; // normal priority
echo $a % $b .'<br>';
// Assignment with math operators
$a += $b;

// Increment operator
$a++; // after increment
++$a; // pre increment
// Decrement operator
$a--;
--$a;
// Number checking functions
is_float(210.2);
is_double(21.1);
is_int(5);
is_numeric("3.14"); // true
is_numeric("3ABC.14"); // false

// Conversion
$strNumber = "11.11";
$numberFloat = (float) $strNumber; // 11.11
var_dump($numberFloat);
$numberInt = (int) $strNumber; // 11

// Number functions
echo "abs(-15) " . abs(-15) . '<br>'; // gives absolute value
echo "pow(2,  3) " . pow(2, 3) . '<br>'; // gives 2^3 = 8 power
echo sprintf("sqrt(16) %s<br>", sqrt(16)); // karesini veriri
echo "max(2, 3) " . max(2, 3) . '<br>'; // gives max value
echo "min(2, 3) " . min(2, 3) . '<br>'; // gives min value
echo "round(2.4) " . round(2.4) . '<br>'; // 2.5 tan kucukse asasgi 2
echo "round(2.6) " . round(2.6) . '<br>'; // 2.5 tan buyukse yukari 3
echo "floor(2.6) " . floor(2.6) . '<br>'; // give always round down 2
echo "ceil(2.4) " . ceil(2.4) . '<br>'; // give always round up  3

// Formatting numbers
$number = 123456789.12345;
echo number_format($number, 2, '.', ',') . '<br>';

// https://www.php.net/manual/en/ref.math.php
