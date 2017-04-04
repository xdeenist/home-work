<?php
require_once 'select_with_rate.php';

/**
* 
*/
class SelectMostPopular extends SelectWithRate
{
	
	function __construct()
	{
	}

	public function SelectRate(){
		$add_rate = parent::AddRate(parent::selectAll("SELECT * FROM books"));
		if ($add_rate) {
			usort($add_rate, function($a, $b){
    		return ($b['rate'] - $a['rate']);
    		});
    		return $result_most = array_slice($add_rate, 0, 6);
		}
	}
}

$add = new SelectMostPopular();
$resule_most_popular = $add->SelectRate();