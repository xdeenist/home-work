<?php
require_once 'query.class.php';

class Genre extends Query
{
   function selectAll($query,$param=[]){
        $select = DbConnect::getConnect()->prepare($query);
        $select->execute($param);
        return $select->fetchAll(PDO::FETCH_ASSOC);

    }

      function insert($query,$param=[]){
        $insert = DbConnect::getConnect()->prepare($query);
        $insert->execute($param);
    }

}



