<?php

class Department {

    private $id_departamento;
    private $nombre;
    private $siglas;
    private $identificador;
   
 

    public function __construct($id_departamento, $nombre, $siglas, $identificador){
        $this -> id_departamento = $id_departamento;
        $this -> nombre = $nombre;
        $this -> siglas = $siglas;
        $this -> identificador = $identificador;
       
    }

    public function getDepartmentId(){
        return $this -> id_departamento;
    }

    public function getDepartmentName(){
        return $this -> nombre;
    }

    public function getDepartmentAcronym(){
        return $this -> siglas;
    }

    public function getDepartmentIdentificator(){
        return $this -> identificador;
    }

    

    

    public function setDepartmentId($id_departamento){
        $this->id_departamento = $id_departamento;
    }

    public function setDepartmentName($nombre){
        $this->nombre = $nombre;
    }

    public function setDepartmentAcronym($siglas){
        $this->siglas = $siglas;
    }

    public function setDepartmentIdentificator($identificador){
        $this->identificador = $identificador;
    }


   
}

?>