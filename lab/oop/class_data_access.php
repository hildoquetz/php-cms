<?php

class Car {
    
    // properties
    public $wheels = 4;
    public $color = 'red';
    protected $engine = 1;
    protected $doors = 2;
    private $model = "Z-4";
    private $branding = "BMW";
    
    // class contructor
    function __construct(){
        echo "\nI'm a new car and I have " . $this->engine . " engine.\n";
    }
    
    // methods
    public function moveWheels(){
        echo "\nMoving\n";
    }
    
    public function getEngine(){
        echo $this->engine;
    }
}

// class inheritance
class Plane extends Car {
    function __construct(){
        echo "\nI mean, a new plane!\n";
    }
}


// using inheritance
$car = new Car();
$jet = new Plane();


// data access 
echo $car->wheels;
#echo $car->engine;         // you can't call directly a private or a 
                            // protected propertie, only using a method !

$car->getEngine();          // now, we can access the protected propertie
 

echo $jet->getEngine();     // the same roles for chield class, but this can't
                            // access the private parent properties, never ! 
