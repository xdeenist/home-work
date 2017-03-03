<?php
require_once 'DbConnect.class.php';
abstract class Query
{
    public $tableName;

    public function update($query,$param=[]){
        $update = DbConnect::getConnect()->prepare($query);
        $update->execute($param);
    }
    public function DeleteItem($query,$param=[]){
        $delete = DbConnect::getConnect()->prepare($query);
        $delete->execute($param);
    }

    public function LastInsert(){
        return $lastins = DbConnect::getConnect()->lastInsertId();
    }

    abstract function selectAll($query,$param=[]);

    abstract function insert($query,$param=[]);
}
