<?php

class DegreeDepartment {

    private $id_departamento_grado;
    private $id_departamento;
    private $id_grado;
    
 

    public function __construct($id_departamento_grado, $id_departamento, $id_grado){
        $this -> id_departamento_grado = $id_departamento_grado;
        $this -> id_departamento = $id_departamento;
        $this -> id_grado = $id_grado;
    }

    public function getDegreeDepartmentId(){
        return $this -> id_departamento_grado;
    }

    public function getDepartmentId(){
        return $this -> id_departamento;
    }

    public function getDegreeId(){
        return $this -> id_grado;
    }


    

    public function setDegreeDepartmentId($id_departamento_grado){
        $this->id_departamento_grado = $id_departamento_grado;
    }

    public function setDepartmentId($id_departamento){
        $this->id_departamento = $id_departamento;
    }

    public function setDegreeId($id_grado){
        $this->id_grado = $id_grado;
    }


}

?>