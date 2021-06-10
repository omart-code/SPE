<?php

class Company {

    private $id_empresa;
    private $nif;
    private $nombre;
    private $email;
    private $telefono;
   

    public function __construct($id_empresa, $nif, $nombre, $email, $telefono){
        $this -> id_empresa = $id_empresa;
        $this -> nif = $nif;
        $this -> nombre = $nombre;
        $this -> email = $email;
        $this -> telefono = $telefono;
       
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

    

    public function getCompanyTelf(){
        return $this -> telefono;
    }

    public function getCompanyEmail(){
        return $this -> email;
    }



    public function setCompanyId($id_empresa){
        $this->id_empresa = $id_empresa;
    }

    public function setCompanyName($nombre){
        $this->nombre = $nombre;
    }

   
    public function setCompanyTelf($telefono){
        $this->telefono = $telefono;
    }

    public function setCompanyEmail($email){
        $this->email = $email;
    }

  
}




?>