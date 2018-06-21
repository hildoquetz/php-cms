<?php

class Car {
    
    // properties
    public $wheels = 4;
    public $color = 'red';
    public $engine = 1;
    public $dors = 2;
    public $model = "Z-4";
    public $branding = "BMW";
    static $coin = 1;

    // methods
    public function moveWheels(){
      echo "\nMoving\n";
    }

    static function add(){
        Car::$coin++;
        return Car::$coin;
    }
}

// we use the static method add() to increment 
// the static propertie $coin 

echo Car::add(); // now, $coin = 2
echo Car::add(); // now, $coin = 3
echo Car::add(); // now, $coin = 4
echo Car::add(); // now, $coin = 5

// We don't need instantiate the class to use 
// static methods and properties, this is awesome ;)