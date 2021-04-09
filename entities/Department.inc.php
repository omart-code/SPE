<?php

class Department {

    private $id_departamento;
    private $nombre;
    private $siglas;
   
 

    public function __construct($id_departamento, $nombre, $siglas){
        $this -> id_departamento = $id_departamento;
        $this -> nombre = $nombre;
        $this -> siglas = $siglas;
       
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

    

    

    public function setDepartmentId($id_departamento){
        $this->id_departamento = $id_departamento;
    }

    public function setDepartmentName($nombre){
        $this->nombre = $nombre;
    }

    public function setDepartmentAcronym($siglas){
        $this->siglas = $siglas;
    }


   
}

?>