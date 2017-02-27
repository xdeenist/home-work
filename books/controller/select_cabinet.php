<?php 
require_once 'select_with_rate.php';
session_start();
/**
* 
*/
class SelectCabinet extends SelectWithRate
{
	
	function __construct()
	{
		if (!$_SESSION['login']) {
			header("Location: ../index.php");
		}
	}

	public function SelectFromUser(){
		return $selus = parent::selectAll("SELECT * FROM books WHERE user_id = '{$_SESSION['user_id']}'");
	}

	public function AddRate(){
		$selus = $this->SelectFromUser();
		for ($i=0; $i < count($selus); $i++) {
			$id = $selus[$i]['book_id'];
			$rate1['rate'] = parent::RateCalc("WHERE book_id = $id");
			$result = array_merge($selus[$i], $rate1);
			$result_select[] = $result;
		}
		return $result_select;
	}
}
$cab = new SelectCabinet();
$result_select = $cab->AddRate();