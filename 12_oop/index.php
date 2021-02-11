<?php

// What is class and instance
// class is a blue print like template, you can also think it is a new data type
// Class has inside variable which called member/ instance variable , and also has some
// some functionallty

require_once "Person.php";
require_once "Student.php";

$person1 = new Person('onur', 30);
$person2 = new Person('adam', 31);
var_dump($person1);

echo $person1::$counter;

$student =  new Student('Sally', 21, "A2");
var_dump($student);

// Create Person class in Person.php

// Create instance of Person

// Using setter and getter