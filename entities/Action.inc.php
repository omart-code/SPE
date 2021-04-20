<?php

class Action {

    private $id_accion;
    private $descripcion;
   
    public function __construct($id_accion, $descripcion){
        $this -> id_accion = $id_accion;
        $this -> descripcion = $descripcion;
        
       
    }

    public function getActionId(){
        return $this -> id_accion;
    }

    public function getActionDescription(){
        return $this -> descripcion;
    }


    public function setActionId($id_accion){
        $this->id_accion = $id_accion;
    }

    public function setActionDescription($descripcion){
        $this->descripcion = $descripcion;
    }
   
}

?>