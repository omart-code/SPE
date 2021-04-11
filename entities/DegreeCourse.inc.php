<?php

class DegreeCourse {

    private $id_curso_grado;
    private $id_curso;
    private $id_grado;
    private $nombre;
    private $activo;
    
 

    public function __construct($id_curso_grado, $id_curso, $id_grado, $nombre, $activo){
        $this -> id_curso_grado = $id_curso_grado;
        $this -> id_curso = $id_curso;
        $this -> id_grado = $id_grado;
        $this -> nombre = $nombre;
        $this -> activo = $activo;
        
    }

    public function getDegreeCourseId(){
        return $this -> id_curso_grado;
    }

    public function getDegreeCourseCourse(){
        return $this -> id_curso;
    }

    public function getDegreeCourseDegree(){
        return $this -> id_grado;
    }

    public function getDegreeCourseName(){
        return $this -> nombre;
    }

    public function getDegreeCourseActive(){
        return $this -> activo;
    }



    

    public function setDegreeCourseId($id_curso_grado){
        $this->id_curso_grado = $id_curso_grado;
    }

    public function setDegreeCourseCourse($id_curso){
        $this->id_curso = $id_curso;
    }

    public function setDegreeCourseDegree($id_grado){
        $this->id_grado = $id_grado;
    }

    public function setDegreeCourseName($nombre){
        $this->nombre = $nombre;
    }

    public function setDegreeCourseActive($activo){
        $this->activo = $activo;
    }


}

?>