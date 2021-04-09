<?php

class Course {

    private $id_curso;
    private $nombre;
    private $fecha_inicio;
    private $fecha_fin;
 

    public function __construct($id_curso, $nombre, $fecha_inicio, $fecha_fin){
        $this -> id_curso = $id_curso;
        $this -> nombre = $nombre;
        $this -> fecha_inicio = $fecha_inicio;
        $this -> fecha_fin = $fecha_fin;
       
    }

    public function getCourseId(){
        return $this -> id_curso;
    }

    public function getCourseName(){
        return $this -> nombre;
    }

    public function getCourseStartDate(){
        return $this -> fecha_inicio;
    }

    public function getCourseEndDate(){
        return $this -> fecha_fin;
    }

    

    public function setCourseId($id_curso){
        $this->id_curso = $id_curso;
    }

    public function setCourseName($nombre){
        $this->nombre = $nombre;
    }

    public function setCourseStartDate($fecha_inicio){
        $this->fecha_inicio = $fecha_inicio;
    }

    public function setCourseEndDate($fecha_fin){
        $this->fecha_fin = $fecha_fin;
    }

   
}

?>