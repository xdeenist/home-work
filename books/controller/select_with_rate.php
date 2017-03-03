<?php 
 require_once '../model/select.class.php';
 /**
 * class add rate book on result select
 * RateSel - select all rate and return summ
 * AddRate - add rate to result select and return result array
 */
 class SelectWithRate extends Select
 {
 	
 	function __construct()
 	{
 	}

 	public function RateSel($where){
 		return $select_rate = parent::selectAll("SELECT rate FROM rate $where");
 	}

 	public function RateCalc($where){
 		$select_rate = $this->RateSel($where);
 		for ($i=0; $i < count($select_rate); $i++) { 
 			$arr[] = $select_rate[$i]['rate'];
 		}
 		return $rate = (int) (ceil(array_sum($arr) / count($arr)));
 	}

 	public function AddRate($select_for_rate){
		for ($i=0; $i < count($select_for_rate); $i++) {
			$id = $select_for_rate[$i]['book_id'];
			$rate1['rate'] = $this->RateCalc("WHERE book_id = $id");
			$result = array_merge($select_for_rate[$i], $rate1);
			$result_select[] = $result;
		}
		return $result_select;
	}
 }
