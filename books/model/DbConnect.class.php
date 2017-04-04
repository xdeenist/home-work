<?php

class DbConnect
{
    private static $db;
    private function __clone()
    {
        return true;
    }
    private function __wakeup()
    {
        return true;
    }
    private function __construct($host, $db_name, $user, $pwd)
    {
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user, $pwd);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
        }
    }
    public static function getConnect(){
        if (!self::$db) {
            self::$db = new DbConnect("localhost", "books", "level", "1");
        }
        return self::$db->conn;
    }
}
$con = DbConnect::getConnect();
// $result =$con->query("SELECT * FROM post");
// $show = $result->fetchAll(PDO::FETCH_ASSOC);
//var_dump($show);