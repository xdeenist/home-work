<?php 

/**
* 
*/
class SortItem
{
	
	function __construct()
	{
		# code...
	}

	public function SetGet(){
		if (isset($_GET['list'])) {
			return $get = "?list=" . $_GET['list'];
		}
		if (isset($_GET['albt'])) {
			return $get = "?albt=" . $_GET['albt'];
		}
		if (isset($_GET['srl'])) {
			return $get = "?srl=" . $_GET['srl'];
		}
		if (isset($_GET['genre'])) {
			return $get = "?genre=" . $_GET['genre'];
		}
	}
}

$g = new SortItem();
$get = $g->SetGet();