<?php 
require_once 'select_with_rate.php';
session_start();
/**
* class selected items for cabinet user
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
		return $select_for_rate = parent::selectAll("SELECT books.*, genre_list.genre_add_title FROM books LEFT JOIN genre_list ON (genre_list.genre_id = books.genre_add_id) WHERE user_id = '{$_SESSION['user_id']}'");
	}

	public function AddRateCabinet(){
		return $select = parent::AddRate($this->SelectFromUser());
	}

}
$cab = new SelectCabinet();
$result_select = $cab->AddRateCabinet();