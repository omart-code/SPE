<?php

class Degree {

    private $id_grado;
    private $nombre;
    private $siglas;
    private $codigo_asignatura;
 

    public function __construct($id_grado, $nombre, $siglas, $codigo_asignatura){
        $this -> id_grado = $id_grado;
        $this -> nombre = $nombre;
        $this -> siglas = $siglas;
        $this -> codigo_asignatura = $codigo_asignatura;
       
    }

    public function getDegreeId(){
        return $this -> id_grado;
    }

    public function getDegreeName(){
        return $this -> nombre;
    }

    public function getDegreeAcronym(){
        return $this -> siglas;
    }

    public function getDegreeHours(){
        return $this -> horas;
    }

    public function getDegreeSubjectCode(){
        return $this -> codigo_asignatura;
    }

    

    public function setDegreeId($id_grado){
        $this->id_grado = $id_grado;
    }

    public function setDegreeName($nombre){
        $this->nombre = $nombre;
    }

    public function setDegreeAcronym($siglas){
        $this->siglas = $siglas;
    }

    public function setDegreeHours($horas){
        $this->horas = $horas;
    }

    public function setDegreeSubjectCode($codigo_asignatura){
        $this->codigo_asignatura = $codigo_asignatura;
    }

   
}

?>