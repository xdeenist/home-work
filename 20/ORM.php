<?php 

class model {
    static public $__table;
    static private $columns = [];
    static private $pk_name;
    static private $identityMap = [];

    private $values = [];
    private $dirty  = true;

    static protected function readStructure(){
        //desc static::$table; => static::$columns
        //                     => static::$pk_name;
    }

    static public function get($pk){ //SELECT * FROM person WHERE id = $pk
        //SELECT * FROM static::$table WHERE static::$pk_name = $pk => $data
        //$class = get_called_class();
        //$this->dirty = false;
        //if $pk in static::$identityMap return static::$identityMap[$pk]
        //else return new $class
    }

    public function __construct($values=[]){
    //    $this->values = $values;
        static::$identityMap[$this->values[static::$pk_name]] = $this;
    }

    public function __get($fieldName){
        return $this->values[$fieldName];
    }

    public function __set($fieldName,$value){
        if ($this->values[$fieldName] !== $value){
            $this->dirty = true;
            $this->values[$fieldName] = $value;
        }
    }

    public function save(){
        if ($this->dirty){
        //if pk - update $table SET ....
        //else  - insert
        }
    }

    public function delete(){
        //delete from $table where $pk_name = $this->values[static::$pk_name]
    }
}

class user extends model {
    static public $table = "user";
}

$user = user::get(1);
$user->name = $user->name . " - лох";
//$user->save();
//$user->delete();
//
$user2 = user::get(1);
$user2->surname = "Aaaaaaa";

$user2->save();





$newUser = new user();
$newUser->name = "Donald";
$newUser->save();

