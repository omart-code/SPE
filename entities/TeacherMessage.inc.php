<?php

class TeacherMessage {

    private $id_mensaje_profesor;
    private $id_tarea;
    private $mensaje;
   
    public function __construct($id_mensaje_profesor, $id_tarea, $mensaje){
        $this -> id_mensaje_profesor = $id_mensaje_profesor;
        $this -> id_tarea = $id_tarea;
        $this -> mensaje = $mensaje;
        
       
    }

    public function getTeacherMessageId(){
        return $this -> id_mensaje_profesor;
    }

    public function getTeacherMessageTask(){
        return $this -> id_tarea;
    }

    public function getTeacherMessageMessage(){
        return $this -> mensaje;
    }



    public function setTeacherMessageId($id_mensaje_profesor){
        $this->id_mensaje_profesor = $id_mensaje_profesor;
    }

    public function setTeacherMessageTask($id_tarea){
        $this->id_tarea = $id_tarea;
    }

    public function setTeacherMessageMessage($mensaje){
        $this->mensaje = $mensaje;
    }
   
}

?>