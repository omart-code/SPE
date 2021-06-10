<?php

class Internship {
    private $id_estancia;
    private $niu_estudiante;
    private $niu_profesor;
    private $fecha_inicio;
    private $fecha_fin;
    private $id_tutor_externo;
    private $id_empresa;
    private $finalizada;
    private $id_curso_grado;

    public function __construct($id_estancia, $niu_estudiante, $niu_profesor, $fecha_inicio,
     $fecha_fin, $id_tutor_externo, $id_empresa, $finalizada, $id_curso_grado) {

        $this -> id_estancia = $id_estancia;
        $this -> niu_estudiante = $niu_estudiante;
        $this -> niu_profesor = $niu_profesor;
        $this -> fecha_inicio = $fecha_inicio;
        $this -> fecha_fin = $fecha_fin;
        $this -> id_tutor_externo = $id_tutor_externo;
        $this -> id_empresa = $id_empresa;
        $this -> finalizada = $finalizada;
        $this -> id_curso_grado = $id_curso_grado;
    }

    public function getIdInternship(){
        return $this -> id_estancia;
    }

    public function getNiuStudent(){
        return $this -> niu_estudiante;
    }

    public function getNiuTeacher(){
        return $this -> niu_profesor;
    }

    public function getStartDate(){
        $startDate = DateTime::createFromFormat('Y-m-d', $this->fecha_inicio);
        $startDate = $startDate->format('d-m-Y');
        return $startDate;
    }

    public function getNormalStartDate(){
        return $this-> fecha_inicio;
    }

    public function getEndDate(){
        $endDate = DateTime::createFromFormat('Y-m-d', $this->fecha_fin);
        $endDate = $endDate->format('d-m-Y');
        return $endDate;
    }

    public function getNormalEndDate(){
        return $this-> fecha_fin;
    }

    public function getIdExternalTeacher(){
        return $this -> id_tutor_externo;
    }

    public function getIdCompany(){
        return $this -> id_empresa;
    }



    public function getFinished(){
        return $this -> finalizada;
    }
    
    public function getIdDegreeCourse(){
        return $this -> id_curso_grado;
    }

    public function setIdInternship($id_estancia){
        $this->id_estancia = $id_estancia;
    }

    public function setNiuStudent($niu_estudiante){
        $this->niu_estudiante = $niu_estudiante;
    }

    public function setNiuTeacher($niu_profesor){
        $this->niu_profesor = $niu_profesor;
    }

    public function setStartDate($fecha_inicio){
         $this->fecha_inicio = $fecha_inicio;
    }

    public function setEndDate($fecha_fin){
        $this->fecha_fin = $fecha_fin;
    }

    public function setIdExternalTeacher($id_tutor_externo){
        $this -> id_tutor_externo = $id_tutor_externo;
    }

    public function setCompany($id_empresa){
        $this -> id_empresa = $id_empresa;
    }


    public function setFinished($finalizada){
        $this -> finalizada = $finalizada;
    }

    public function setIdDegreeCourse($id_curso_grado){
        $this -> id_curso_grado = $id_curso_grado;
    }
}
?>