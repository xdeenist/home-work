<?php
require_once 'query.class.php';

/**
* 
*/
class Add extends Query
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

    public function FileSecure($file_type, $myfile){
        $file_ex = new SplFileInfo(basename($_FILES["$myfile"]['name']));
        $file_extens = $file_ex->getExtension();
        foreach ($file_type as $value) {
            if ($value == $file_extens) {
                return $fl_extens = true;                
            } 
        }
    }
}

