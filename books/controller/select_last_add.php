<?php 
require_once 'select_with_rate.php';

/**
* 
*/
class SelectLastAdd extends SelectWithRate
{
	
	function __construct()
	{
	}

	public function SelectRate(){
		$add_rate = parent::AddRate(parent::selectAll("SELECT * FROM books ORDER BY book_create_datetime DESC"));
    	return $result_add = array_slice($add_rate, 0, 6);
	}
}

$add = new SelectLastAdd();
$resule_sel_add = $add->SelectRate();


