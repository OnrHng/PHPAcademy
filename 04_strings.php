<?php

// Create simple string
$name = 'Onur';
$age = 30;

$string = "Hello, I am $name and am $age"; // You can write variable in the sentence
$string2 = 'Hello, I am '.$name; // directly can't write variable in the sentence
echo $string . '<br>';
echo $string2 . '<br>';

// String concatenation
echo "Hello " . " World" . " and PHP".'<br>'; // Multiple concatenation . " and PHP";
echo '<hr>';

// String functions
$string = "    Hello World      ";

echo "1 - " . strlen($string) . '<br>' . PHP_EOL; // string length  // PHP_EOL means \n
echo "2 - " . trim($string) . '<br>' . PHP_EOL; // remove empty spaces
echo "3 - " . ltrim($string) . '<br>' . PHP_EOL; // remove left side spaces
echo "4 - " . rtrim($string) . '<br>' . PHP_EOL; // remove right side spaces
echo "5 - " . str_word_count($string) . '<br>' . PHP_EOL; // numbers of words
echo "6 - " . strrev($string) . '<br>' . PHP_EOL; // reverse word
echo "7 - " . strtoupper($string) . '<br>' . PHP_EOL; // to UpperCase
echo "8 - " . strtolower($string) . '<br>' . PHP_EOL; // to lowerCsae
echo "9 - " . ucfirst('hello') . '<br>' . PHP_EOL; // convert first letter to Upper
echo "10 - " . lcfirst('HELLO') . '<br>' . PHP_EOL; // convert first letter to lower
echo "11 - " . ucwords('hello world') . '<br>' . PHP_EOL; // convert first letters of word to upper
echo "12 - " . strpos($string, 'world') . '<br>' . PHP_EOL; // search world inside the string with sensitive case
echo "13 - " . stripos($string, 'world') . '<br>' . PHP_EOL; // search world inside the string with insensitive case
echo "14 - " . substr($string, 8) . '<br>' . PHP_EOL; // get substring of the string from index including white spaces
echo "15 - " . str_replace('World', 'PHP', $string) . '<br>' . PHP_EOL; // first search word "World" and replace with sensitive case
echo "16 - " . str_ireplace('world', 'PHP', $string) . '<br>' . PHP_EOL;// replace words with ignore case

$invoiceNumber = 100;
$invoiceNumber2 = 123456;
echo str_pad($invoiceNumber, 8, '0', STR_PAD_LEFT) . '<br>' . PHP_EOL;
echo str_pad($invoiceNumber2, 8, '0', STR_PAD_LEFT) . '<br>' . PHP_EOL;
echo str_repeat('Hello', 2) . '<br>' . PHP_EOL; // verdigin kelimeyi iki defa tekrar ediyor.
echo '<hr>';
// Multiline text and line breaks
$longText = "
  Hello, my name is Onur
  I am 30,
  I love my daughter
";
echo $longText . '<br>' . PHP_EOL;
echo nl2br($longText) . '<br>' . PHP_EOL; // this function find all break line and print them with <br>

echo '<hr>';
// Multiline text and reserve html tags
$longText = "
  Hello, my name is <b>Onur</b>
  I am <b>30</b>,
  I love my daughter
";
echo sprintf("1 - %s<br>", $longText); // blod Onur and 30 but without break lines

echo "1 - " . $longText . '<br>'; // blod Onur and 30 but without break lines
echo "2 - " . nl2br($longText) . '<br>'; // blod Onur and 30 but with break lines
echo "3 - " . htmlentities($longText) . '<br>' . PHP_EOL;// not blod Onur and 30 and with html tags without br
echo "4 - " . nl2br(htmlentities($longText)) . '<br>' . PHP_EOL; // not blod Onur and 30 and with html tags with br
echo "5 - " . html_entity_decode(htmlentities($longText)) . '<br>' . PHP_EOL; // useful for SQL injection // blod Onur and 30 and without html tags without br
echo "6 - " . htmlspecialchars($longText) . '<br>' . PHP_EOL;


// https://www.php.net/manual/en/ref.strings.php
