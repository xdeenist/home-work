<?php

class Transport {
	public $color;
    public $speed;
    public $brand; 


	public function distTime($distance) {
		$time = $distance / $this->speed;
		return $time;
	}
}

class Car extends Transport {
	public $fuel;
	public function FuckFuelEconomy($distance) {
		$fuelres = 	($this->fuel * $distance) / 100;
		return $fuelres;	
	}
}


class Moped extends Car {
	public $weight;
}

class Bicucle extends Moped {
	public $type;
}

$car = new Car;
$car->speed = 120;
$car->fuel = 12;

$bicucle = new Bicucle;
$bicucle->speed = 20;

$moped = new Moped;
$moped->speed = 60;
$moped->fuel = 5;
$moped->color = "Red";


$distance = 95;
echo 'Car time: ' . $car->distTime($distance) . "\n";
echo "Car fuel economy: " . $car->FuckFuelEconomy($distance) . "\n";
echo "Color moped: " . $moped->color . "\n";
echo 'Moped time: ' . $moped->distTime($distance). "\n";
echo "Moped economy: " . $moped->FuckFuelEconomy($distance) . "\n";
echo "Bicucle time: " . $bicucle->distTime($distance). "\n";


