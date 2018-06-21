<?php

class Car {
    
    // properties
    public $wheels = 4;
    public $color = 'red';
    public $engine = 1;
    public $dors = 2;
    public $model = "Z-4";
    public $branding = "BMW";
    
    // class contructor
    function __construct(){
        echo "I'm a new car and I have " . $this->engine . " engine.";
    }
    
    // methods
    public function moveWheels(){
        echo "\nMoving\n";
    }
}

// class inheritance
class Plane extends Car {
    function __construct(){
        echo "I mean, a new plane!";
    }
}

// check inheritance
if(class_exists("Plane") && method_exists("Plane", "moveWheels") ){
    echo "yes.";
} else {
    echo "Error --";
}

// using inheritance
$car = new Car();
$jet = new Plane();

