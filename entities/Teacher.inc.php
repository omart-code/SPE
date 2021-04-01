<?php

class Teacher {
    private $niu_profesor;
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $id_departamento;

    public function __construct($niu_profesor, $nombre, $apellido, $email, $telefono, $id_departamento){
        $this -> niu_profesor = $niu_profesor;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> email = $email;
        $this -> telefono = $telefono;
        $this -> id_departamento = $id_departamento;
    }

    public function getTeacherNiu(){
        return $niu_profesor -> niu_profesor;
    }

    public function getTeacherName(){
        return $this -> nombre;
    }

    public function getTeacherSurname(){
        return $this -> apellido;
    }

    public function getTeacherEmail(){
        return $this -> email;
    }

    public function getTeacherTelf(){
        return $this -> telefono;
    }

    public function getTeacherDepartment(){
        return $this -> id_departamento;
    }


    public function setTeacherNiu($niu_profesor){
        $this->niu_profesor = $niu_profesor;
    }

    public function setTeacherDepartment($id_departamento){
        $this->id_departamento = $id_departamento;
    }

    public function setTeacherName($nombre){
        $this->nombre = $nombre;
    }

    public function setTeacherSurname($apellido){
        $this->apellido = $apellido;
    }

    public function setTeacherTelf($telefono){
        $this->telefono = $telefono;
    }

    public function setTeacherEmail($email){
        $this->email = $email;
    }

}
?>