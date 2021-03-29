<?php

class Connection {
    private static $conn;
    
    public static function openConnection(){
        if(!isset(self::$conn)){
            try{
                include_once 'config.inc.php';
                self::$conn = new PDO("mysql:host=$name_server; dbname=$name_bd", $name_user, $password );
                self::$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn -> exec('SET CHARACTER SET utf8');
             
            }catch (Exception $e){
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
    }

    public static function closeConnection(){
        if(isset(self::$conn)){
            self::$conn = null;
           
        }
    }

    public static function getConnection(){
        return self::$conn;
    }
}


?>