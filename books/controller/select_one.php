<?php 
require_once 'select_list.php';
session_start();
/**
* 
*/
class SelectOneBook extends SelectList
{
	
	function __construct()
	{
	}

	public function SelectOne(){
		return $result_sel_one = parent::SelectListGet();
	}
}

$one = new SelectOneBook();
$result_sel_one = $one->SelectOne();
// var_dump($result_sel_one);
