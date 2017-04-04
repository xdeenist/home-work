<?php
require_once 'query.class.php';

/**
* 
*/
class Select extends Query
{
	public $select;
    public $insert;
    
	function __construct()
	{
	}

	public function selectAll($query,$param=[]){
        $select = DbConnect::getConnect()->prepare($query);
        $select->execute($param);
        return $select->fetchAll(PDO::FETCH_ASSOC);

    }

    public function insert($query,$param=[]){
        $insert = DbConnect::getConnect()->prepare($query);
        $insert->execute($param);
    }
}

