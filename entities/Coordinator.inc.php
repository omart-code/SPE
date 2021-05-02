<?php

class Coordinator {

    private $niu_coordinador;
    private $id_grado;
   
    public function __construct($niu_coordinador, $id_grado){
        $this -> niu_coordinador = $niu_coordinador;
        $this -> id_grado = $id_grado;
        
       
    }

    public function getCoordinatiorNiu(){
        return $this -> niu_coordinador;
    }

    public function getCoordinatorDegreeId(){
        return $this -> id_grado;
    }


    public function setCoordinatorNiu($niu_coordinador){
        $this->niu_coordinador = $niu_coordinador;
    }

    public function setCoordinatorDegreeId($id_grado){
        $this->id_grado = $id_grado;
    }
   
}

?>