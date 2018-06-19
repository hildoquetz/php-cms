<?php

class Car {
    
    // properties
    var $wheels = 4;
    var $color = 'red';
    var $engine = 1;
    var $dors = 2;
    var $model = "Z-4";
    var $branding = "BMW";

    // methods
    function moveWheels(){
        echo "Moving";
    }
}

// check if the class and method existis 

if(class_exists("Car")){
    echo "\nYes!";
}

if(method_exists("Car", "moveWheels")){
    echo "\nThe method existis!\n";
}

// using methods and properties

$mercedes = new Car; // new object
$mercedes->moveWheels(); // call method
$mercedes->branding = "Mercedes Benz"; // change propertie
echo $mercedes->branding; // call propertie 
