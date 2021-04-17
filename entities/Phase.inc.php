<?php

class Phase {

    private $id_etapa;
    private $nombre;
   
    public function __construct($id_etapa, $nombre){
        $this -> id_etapa = $id_etapa;
        $this -> nombre = $nombre;
        
       
    }

    public function getPhaseId(){
        return $this -> id_Etapa;
    }

    public function getPhaseName(){
        return $this -> nombre;
    }


    public function setPhaseId($id_etapa){
        $this->id_etapa = $id_etapa;
    }

    public function setPhaseName($nombre){
        $this->nombre = $nombre;
    }
   
}

?>