<?php 
 require_once '../model/select.class.php';
session_start();
 /**
 * This is rate book on site class
 */
 class SelectWithRate extends Select
 {
 	
 	function __construct()
 	{
 		# code...
 	}

 	public function RateSel($where){
 		return $select_rate = parent::selectAll("SELECT rate FROM rate $where");
 	}

 	public function RateCalc($where){
 		$select_rate = $this->RateSel($where);
 		for ($i=0; $i < count($select_rate); $i++) { 
 			$arr[] = $select_rate[$i]['rate'];
 		}
 		return $rate = strval(ceil(array_sum($arr) / count($arr)));
 	}
 }

 // $rate = new SelectWithRate();
 // $final_rate = $rate->RateCalc("WHERE book_id = 25");