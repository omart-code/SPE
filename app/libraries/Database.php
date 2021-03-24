<?php

class Database {
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    private $stmt;
    private $dbHandler;
    private $error;

    public function __construct() {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass,  $options);
        }catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //Funcion para crear queries

    public function query($sql){
        $this->statement = $this->dbHandler->prepare($sql);
    }

    //Bindar params
    public function bind($param, $value, $type = null){
        switch (is_null($type)){
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default;
                $type = PDO::PARAM_STRING;
        }
        $this->statement->bindValue($param, $value, $type );
    }

    //Ejecutamos la query
    public function execute() {
        return $this->statement->execute();
    }

    //Obtenemos el resultado en array
    public function resultQuery(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    //Obtener un registro como un objheto
    public function single(){
        $this->execute();
        return $this->statement->fetch(PDO::FETECH_OBJ);
    }


}