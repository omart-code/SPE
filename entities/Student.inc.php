<?php

class Student {
    private $niu_estudiante;
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $id_mencion;
    private $id_grado;

    public function __construct($niu_estudiante, $nombre, $apellido, $email, $telefono, $id_mencion, $id_grado){
        $this -> niu_estudiante = $niu_estudiante;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> email = $email;
        $this -> telefono = $telefono;
        $this -> id_mencion= $id_mencion;
        $this -> id_grado= $id_grado;
    }

    public function getStudentNiu(){
        return $this -> niu_estudiante;
    }


    public function getStudentName(){
        return $this -> nombre;
    }

    public function getStudentSurname(){
        return $this -> apellido;
    }

    public function getStudentTelf(){
        return $this -> telefono;
    }

    public function getStudentEmail(){
        return $this -> email;
    }

    public function getStudentMention(){
        return $this -> id_mencion;
    }

    public function getStudentDegree(){
        return $this -> id_grado;
    }


    public function setStudentNiu($niu_estudiante){
        $this->niu_estudiante = $niu_estudiante;
    }


    public function setStudentName($nombre){
        $this->nombre = $nombre;
    }

    public function setStudentSurname($apellido){
        $this->apellido = $apellido;
    }

    public function setStudentTelf($telefono){
        $this->telefono = $telefono;
    }

    public function setStudentEmail($email){
        $this->email = $email;
    }

    public function setStudentMention($id_mencion){
        $this->id_mencion = $id_mencion;

    }

    public function setStudentDegree($id_grado){
        $this->id_grado = $id_grado;

    }
}
?>