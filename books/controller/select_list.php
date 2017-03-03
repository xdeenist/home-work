<?php 
	require_once 'select_with_rate.php';

/**
* class return array with result item
*/
class SelectList extends SelectWithRate
{
	
	function __construct()
	{
	}

	public function Where(){
		if ($_GET['list'] && $_GET['sort'] == "new") {
			$get = $_GET['list'];
			return $where = "";
		} elseif ($_GET['list']) {
			$get = $_GET['list'];
			return $where = "ORDER BY book_create_datetime DESC";
		}
		if ($_GET['genre'] && $_GET['sort'] == "new") {
			$get = $_GET['genre'];
			return $where = "WHERE genre_add_id = $get";
		} elseif ($_GET['genre']) {
			$get = $_GET['genre'];
			return $where = "WHERE genre_add_id = $get ORDER BY book_create_datetime DESC";
		}
		if ($_GET['albt'] && $_GET['sort'] == "new") {
			$get = $_GET['albt'] . "%";
			return $where = "WHERE author LIKE '$get'";
		} elseif ($_GET['albt']) {
			$get = $_GET['albt'] . "%";
			return $where = "WHERE author LIKE '$get' ORDER BY book_create_datetime DESC";
		}
		if ($_GET['srl'] && $_GET['sort'] == "new") {
			$get = $_GET['srl'] . "%";
			return $where = "WHERE book_serial LIKE '$get'";
		} elseif ($_GET['srl']) {
			$get = $_GET['srl'] . "%";
			return $where = "WHERE book_serial LIKE '$get' ORDER BY book_create_datetime DESC";
		}
		if ($_GET['edit']) {
			$get = $_GET['edit'];
			return $where = "WHERE book_id = '$get'";
		}
	}

	public function SelectListGet(){
		$where = $this->Where();
		$SelectListGet = parent::selectAll("SELECT * FROM books $where");
		return $select_res_with_rate = parent::AddRate($SelectListGet);
	}

	public function SortByRate(){
		$select_res_with_rate = $this->SelectListGet();
		if ($select_res_with_rate){
			if ($_GET['rsort'] == "b") {
				usort($select_res_with_rate, function($a, $b){
    				return ($a['rate'] - $b['rate']);
				});
				return $select_res_rate  = $select_res_with_rate;
			} elseif ($_GET['rsort'] == "s") {
				usort($select_res_with_rate, function($a, $b){
    				return $select_res_rate  = ($b['rate'] - $a['rate']);
				});
				return $select_res_rate  = $select_res_with_rate;
			} else { return $select_res_rate  = $select_res_with_rate; }
		}
	}
}

$sel = new SelectList();
$select_res_rate  = $sel->SortByRate();

