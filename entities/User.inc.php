<?php

class User {
    private $niu;
    private $password;
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $id_tipo_usuario;
    private $id_tipo_usuario2;

    public function __construct( $niu, $password, $nombre, $apellido, $email, $telefono, $id_tipo_usuario, $id_tipo_usuario2){

        $this -> niu = $niu;
        $this -> password = $password;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> email = $email;
        $this -> telefono = $telefono;
        $this -> id_tipo_usuario= $id_tipo_usuario;
        $this -> id_tipo_usuario2= $id_tipo_usuario2;
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
        return $this -> id_tipo_usuario;
    }

    public function getUserType2(){
        return $this -> id_tipo_usuario2;
    }

    public function setUserNiu($niu){
        $this->niu = $niu;
    }

    public function setUserPassword($password){
        $this->password = $password;
    }

    public function setUserName($nombre){
        $this->nombre = $nombre;
    }

    public function setUserSurname($apellido){
        $this->apellido = $apellido;
    }

    public function setUserTelf($telefono){
        $this->telefono = $telefono;
    }

    public function setUserEmail($email){
        $this->email = $email;
    }

    public function setUserType($tipo_usuario){
        $this->tipo_usuario = $tipo_usuario;

    }
}
?>