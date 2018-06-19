<?php

class Car {
    
    // properties
    public $wheels = 4;
    public $color = 'red';
    public $engine = 1;
    public $dors = 2;
    public $model = "Z-4";
    public $branding = "BMW";

    // methods
    public function moveWheels(){
      echo "\nMoving\n";
    }
}

// class inheritance
class Plane extends Car {
    
}

// check inheritance
if(class_exists("Plane") && method_exists("Plane", "moveWheels") ){
    echo "yes.";
} else {
    echo "Error --";
}

// using inheritance
$jet = new Plane();
$jet->moveWheels();
echo $jet->wheels;

