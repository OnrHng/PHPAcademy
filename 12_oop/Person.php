<?php


class Person{
    public string $name;
    private ?int $age; // buradaki soru isareti ile age e hem number girebilirsin ve null

    // defination of static variable
    public static int $counter = 0;

    // constructor
    public function __construct($name, $age)
    {
        $this->age = $age;
        $this->name = $name;

        self::$counter++;
    }

    // setter
    public function setAge($age){
        $this->age = $age;
    }

    // getter
    public function getAge(){
        return $this->age;
    }

    // definition of the static mehtods
    public static function getCounter(){
        return self::$counter;

    }

}