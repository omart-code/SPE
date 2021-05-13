<?php

class InternshipTask{

    private $id_tarea_estancia;
    private $id_estancia;
    private $nombre;
    private $id_tarea;
    private $fecha_prevista_tarea;
    private $fecha_realiz_accion1;
    private $fecha_realiz_accion2;
    private $fecha_realiz_accion3;
    private $finalizada;
   
    public function __construct($id_tarea_estancia , $id_estancia, $id_tarea,  $fecha_prevista_tarea,  $fecha_realiz_accion1,  $fecha_realiz_accion2, $fecha_realiz_accion3, $finalizada){
        $this -> id_tarea_estancia = $id_tarea_estancia;
        $this -> id_estancia = $id_estancia;
        $this -> id_tarea = $id_tarea;
        $this -> fecha_prevista_tarea = $fecha_prevista_tarea;
        $this -> fecha_realiz_accion1 = $fecha_realiz_accion1;
        $this -> fecha_realiz_accion2 = $fecha_realiz_accion2;
        $this -> fecha_realiz_accion3 = $fecha_realiz_accion3;
        $this -> finalizada = $finalizada;
        
       
    }

    public function getInternshipTaskId(){
        return $this -> id_tarea_estancia;
    }

    public function getInternshipId(){
        return $this -> id_estancia;
    }
  

    public function getTaskId(){
        return $this -> id_tarea;
    }

    public function getTaskDate(){
        if ($this->fecha_prevista_tarea == '0000-00-00'){
            return;
        }else{
            $taskDate = DateTime::createFromFormat('Y-m-d', $this->fecha_prevista_tarea);
            $taskDate = $taskDate->format('d-m-Y');
            return $taskDate;
        }
       
    }
    
    public function getNormalTaskDate(){
        if ($this->fecha_prevista_tarea == '0000-00-00'){
            return;
        }else{
            $date = new DateTime($this->fecha_prevista_tarea);
            return  $date;
        }
       
    }

    public function getAction1Date(){
     
        if ($this->fecha_realiz_accion1 == '0000-00-00'){
            return ;
        }else{
            $taskAct1 = DateTime::createFromFormat('Y-m-d', $this->fecha_realiz_accion1);
            $taskAct1 = $taskAct1->format('d-m-Y');
             return $taskAct1;
        }
    }

    public function getNormalAction1Date(){
        if ($this->fecha_realiz_accion1 == '0000-00-00'){
            return;
        }else{
            $date = new DateTime($this->fecha_realiz_accion1);
            return  $date;
        }
       
    }

    public function getAction2Date(){

        if ($this->fecha_realiz_accion2 == '0000-00-00'){
            return;
        }else{
            $taskAct2 = DateTime::createFromFormat('Y-m-d', $this->fecha_realiz_accion2);
            $taskAct2 = $taskAct2->format('d-m-Y');
             return $taskAct2;
        }
       
    }

    public function getNormalAction2Date(){
        if ($this->fecha_realiz_accion2 == '0000-00-00'){
            return;
        }else{
            $date = new DateTime($this->fecha_realiz_accion2);
            return  $date;
        }
       
    }

    public function getAction3Date(){
        if ($this->fecha_realiz_accion3 == '0000-00-00'){
            return;
        }else{
            $taskAct3 = DateTime::createFromFormat('Y-m-d', $this->fecha_realiz_accion3);
            $taskAct3 = $taskAct3->format('d-m-Y');
            return $taskAct3;
        }
       
    }

    public function getNormalAction3Date(){
        if ($this->fecha_realiz_accion3 == '0000-00-00'){
            return;
        }else{
            $date = new DateTime($this->fecha_realiz_accion3);
            return  $date;
        }
       
    }

    public function getFinished(){
        return $this -> finalizada;
    }





    public function setInternshipTaskId($id_tarea_estancia){
        $this->id_tarea_estancia = $id_tarea_estancia;
    }

    public function setInternshipId($id_estancia){
        $this->id_estancia = $id_estancia;
    }
    
    public function setTaskId($id_tarea){
        $this->id_tarea = $id_tarea;
    }
    public function setTaskDate($fecha_prevista_tarea){
        $this->fecha_prevista_tarea = $fecha_prevista_tarea;
    }
    public function setAction1Date($fecha_realiz_accion1){
        $this->fecha_realiz_accion1 = $fecha_realiz_accion1;
    }
    public function setAction2Date($fecha_realiz_accion2){
        $this->fecha_realiz_accion2 = $fecha_realiz_accion2;
    }
    public function setAction3Date($fecha_realiz_accion3){
        $this->fecha_realiz_accion3 = $fecha_realiz_accion3;
    }
   
}

?>