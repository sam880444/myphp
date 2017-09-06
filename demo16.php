<?php
class Bike {
    var $color;
    private $speed;

    function__construct(){
        $this->speed=0;
}


    function upSpeed(){
        $this->speed *=1.2;
    }
   function downSpeed(){
       $this->speed *=1.7;

   }

   function getSpeed(){
       return $this->speed;
   }

}

$myBike = new Bike;
$urBike = new Bike;



$myBike->upSpeed();
$myBike->upSpeed();
$myBike->upSpeed();
$myBike->upSpeed();





echo "myBike:{$myBike->getSpeed()}<br>";
echo "urBike:{$urBike->getSpeed()}<br>";


