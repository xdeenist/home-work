<?php 
require_once 'select_with_rate.php';

/**
* 
*/
class SelBesteller extends SelectWithRate
{
	
	function __construct()
	{
	}

	public function SelectRate(){
		$add_rate = parent::AddRate(parent::selectAll("SELECT * FROM books ORDER BY book_create_datetime DESC"));
		if ($add_rate) {
			usort($add_rate, function($a, $b){
    		return ($b['rate'] - $a['rate']);
    		});
    		return $result_bestsel = array_slice($add_rate, 0, 4);
		}
	}
}

$sel = new SelBesteller();
$result_bestsel = $sel->SelectRate();
