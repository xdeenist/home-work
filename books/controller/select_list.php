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
		if (isset($_GET['list']) && isset($_GET['sort']) && $_GET['sort'] == "new") {
			$get = $_GET['list'];
			return $where = "";
		} elseif (isset($_GET['list'])) {
			$get = $_GET['list'];
			return $where = "ORDER BY book_create_datetime DESC";
		}
		if (isset($_GET['genre']) && isset($_GET['sort']) && $_GET['sort'] == "new") {
			$get = $_GET['genre'];
			return $where = "WHERE genre_add_id = $get";
		} elseif (isset($_GET['genre'])) {
			$get = $_GET['genre'];
			return $where = "WHERE genre_add_id = $get ORDER BY book_create_datetime DESC";
		}
		if (isset($_GET['albt']) && isset($_GET['sort']) && $_GET['sort'] == "new") {
			$get = $_GET['albt'] . "%";
			return $where = "WHERE author LIKE '$get'";
		} elseif (isset($_GET['albt'])) {
			$get = $_GET['albt'] . "%";
			return $where = "WHERE author LIKE '$get' ORDER BY book_create_datetime DESC";
		}
		if (isset($_GET['srl']) && isset($_GET['sort']) &&  $_GET['sort'] == "new") {
			$get = $_GET['srl'] . "%";
			return $where = "WHERE book_serial LIKE '$get'";
		} elseif (isset($_GET['srl'])) {
			$get = $_GET['srl'] . "%";
			return $where = "WHERE book_serial LIKE '$get' ORDER BY book_create_datetime DESC";
		}
		if (isset($_GET['edit'])) {
			$get = $_GET['edit'];
			return $where = "WHERE book_id = '$get'";
		}
		if (isset($_GET['id'])) {
			$get = $_GET['id'];
			return $where = "WHERE book_id = '$get'";
		}
		if (isset($_GET['author'])) {
			$get = $_GET['author'];
			return $where = "WHERE author LIKE '$get'";
		}
		if (isset($_GET['serial'])) {
			$get = $_GET['serial'];
			return $where = "WHERE book_serial LIKE '$get'";
		}
		if (isset($_GET['edition'])) {
			$get = $_GET['edition'];
			return $where = "WHERE edition_add LIKE '$get'";
		}
	}

	public function SelectListGet(){
		$where = $this->Where();
		$SelectListGet = parent::selectAll("SELECT books.*, genre_list.genre_add_title FROM books LEFT JOIN genre_list ON (genre_list.genre_id = books.genre_add_id)  $where");
		return $select_res_with_rate = parent::AddRate($SelectListGet);
	}

	public function SortByRate(){
		$select_res_with_rate = $this->SelectListGet();
		if ($select_res_with_rate){
			if (isset($_GET['rsort']) && $_GET['rsort'] == "b") {
				usort($select_res_with_rate, function($a, $b){
    				return ($a['rate'] - $b['rate']);
				});
				return $select_res_rate  = $select_res_with_rate;
			} elseif (isset($_GET['rsort']) && $_GET['rsort'] == "s") {
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

