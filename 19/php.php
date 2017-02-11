<?php
abstract class writing_device
{
	
	abstract public function write();
		function test(){
			echo "Test";
		}
}

class Marker extends writing_device{
	public $color;
	public $type;

	function write() {
		echo "This is writen with color" . $this->color . "\n";
	}
} 
$blue_marker = new Marker();
$blue_marker->color ="blue";
$blue_marker->write();

