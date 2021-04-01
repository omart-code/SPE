<?php

class ExternalTeacher {

    private $id_tutor_externo;
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $id_empresa;
    

    public function __construct($id_tutor_externo, $nombre, $apellido, $email, $telefono, $id_empresa) {
         
        $this -> id_tutor_externo = $id_tutor_externo;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> email = $email;
        $this -> telefono = $telefono;
        $this -> id_empresa = $id_empresa;
       
    }

    public function getIdTeacher(){
        return $this -> id_tutor_externo;
    }

    public function getName(){
        return $this -> nombre;
    }

    public function getSurname(){
        return $this -> apellido;
    }

    public function getEmail(){
        return $this -> email;
    }

    public function getTelf(){
        return $this -> telefono;
    }

    public function getIdCompany(){
        return $this->id_empresa;
    }

    public function setIdTeacher($id_tutor_externo){
        $this -> id_tutor_externo = $id_tutor_externo;
    }

    public function setName($nombre){
        $this -> nombre = $nombre;
    }

    public function setSurname($apellido){
        $this -> apellido = $apellido;
    }

    public function setEmail($email){
        $this -> email = $email;
    }

    public function setTelf($telefono){
        $this -> telefono = $telefono;
    }

    public function setIdCompany($id_empresa){
        $this -> id_empresa = $id_empresa;
    }





}





?>