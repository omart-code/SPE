<?php

class User {
    private $niu;
    private $password;
    private $nombre;
    private $apellido;
    private $telefono;
    private $tipo_usuario;

    public function __construct($niu, $password, $nombre, $apellido, $email, $telefono, $tipo_usuario){
        $this -> niu = $niu;
        $this -> password = $password;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> telefono = $email;
        $this -> telefono = $telefono;
        $this -> tipo_usuario= $tipo_usuario;
    }

    public function getUserNiu(){
        return $this -> niu;
    }

    public function getUserPassword(){
        return $this -> password;
    }

    public function getUserName(){
        return $this -> nombre;
    }

    public function getUserSurname(){
        return $this -> apellido;
    }

    public function getUserTelf(){
        return $this -> telefono;
    }

    public function getUserEmail(){
        return $this -> email;
    }

    public function getUserType(){
        return $this -> tipo_usuario;
    }
}
?>