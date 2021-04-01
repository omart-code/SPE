<?php

class Company {

    private $id_empresa;
    private $nif;
    private $nombre;
    private $email;
    private $telefono;
    private $direccion;
    private $responsable;

    public function __construct($id_empresa, $nif, $nombre, $email, $telefono, $direccion, $responsable){
        $this -> id_empresa = $id_empresa;
        $this -> nif = $nif;
        $this -> nombre = $nombre;
        $this -> direccion = $direccion;
        $this -> email = $email;
        $this -> telefono = $telefono;
        $this -> responsable = $responsable;
    }

    public function getCompanyId(){
        return $this -> id_empresa;
    }

    public function getCompanyNif(){
        return $this -> nif;
    }

    public function getCompanyName(){
        return $this -> nombre;
    }

    public function getCompanyAddress(){
        return $this -> direccion;
    }

    public function getCompanyTelf(){
        return $this -> telefono;
    }

    public function getCompanyEmail(){
        return $this -> email;
    }

    public function getCompanyBoss(){
        return $this -> responsable;
    }


    public function setCompanyId($id_empresa){
        $this->id_empresa = $id_empresa;
    }

    public function setCompanyName($nombre){
        $this->nombre = $nombre;
    }

    public function setCompanyAddress($direccion){
        $this->direccion = $direccion;
    }

    public function setCompanyTelf($telefono){
        $this->telefono = $telefono;
    }

    public function setCompanyEmail($email){
        $this->email = $email;
    }

    public function setCompanyBoss($responsable){
        $this->responsable = $responsable;
    }
}




?>