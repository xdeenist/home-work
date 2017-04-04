<?php 
require_once 'select_list.php';
if (!isset($_SESSION)) {
  session_start(); 
}
/**
* 
*/
class SelectOneBook extends SelectList
{
	
	function __construct()
	{
		if (!$_SESSION['login']) {
			header("Location: ../index.php");
		}
	}

	public function SelectOne(){
		return $result_sel_one = parent::SelectListGet();
	}
}

$one = new SelectOneBook();
$result_sel_one = $one->SelectOne();
// var_dump($result_sel_one);
