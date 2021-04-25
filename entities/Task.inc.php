<?php

class Task {

    private $id_tarea;
    private $id_etapa;
    private $id_curso_grado;
    private $nombre;
    private $informacion;
    private $mensaje;
    private $accion1;
    private $accion2;
    private $accion3;
    private $numero_acciones;
   
    public function __construct($id_tarea, $id_etapa,$id_curso_grado, $nombre,  $informacion, $mensaje,  $accion1, $accion2,  $accion3,  $numero_acciones ){
        $this -> id_tarea = $id_tarea;
        $this -> id_etapa = $id_etapa;
        $this -> id_curso_grado = $id_curso_grado;
        $this -> nombre = $nombre;
        $this -> informacion = $informacion;
        $this -> mensaje = $mensaje;
        $this -> accion1 = $accion1;
        $this -> accion2 = $accion2;
        $this -> accion3 = $accion3;
        $this -> numero_acciones = $numero_acciones;
       
    }

    public function getTaskId(){
        return $this -> id_tarea;
    }

    public function getTaskPhase(){
        return $this -> id_etapa;
    }


    public function getTaskDegreeCourse(){
        return $this -> id_curso_grado;
    }

    
    public function getTaskName(){
        return $this -> nombre;
    }

    
    public function getTaskInfo(){
        return $this -> informacion;
    }

    
    public function getTaskMessage(){
        return $this -> mensaje;
    }

    
    public function getTaskAction1(){
        return $this -> accion1;
    }

    public function getTaskAction2(){
        return $this -> accion2;
    }

    public function getTaskAction3(){
        return $this -> accion3;
    }

    public function getTaskNumActions(){
        return $this -> numero_acciones;
    }

    public function setTaskId($id_tarea){
        $this->id_tarea = $id_tarea;
    }
    public function setTaskPhase($id_etapa){
        $this->id_etapa = $id_etapa;
    }
    public function setTaskDegreeCourse($id_curso_grado){
        $this->id_curso_grado = $id_curso_grado;
    }
    public function setTaskName($nombre){
        $this->nombre = $nombre;
    }

    public function setTaskInfo($informacion){
        $this->informacion = $informacion;
    }
    public function setTaskMessage($mensaje){
        $this->mensaje = $mensaje;
    }
    public function setTaskAction1($accion1){
        $this->accion1 = $accion1;
    }
    public function setTaskAction2($accion2){
        $this->accion2 = $accion2;
    }

    public function setTaskAction3($accion3){
        $this->accion3 = $accion3;
    }
    public function setTaskNumActions($numero_acciones){
        $this->numero_acciones = $numero_acciones;
    }








   
}

?>