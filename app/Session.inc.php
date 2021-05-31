<?php

class ControlSession{

    public static function startSession($niu, $id_tipo_usuario, $id_tipo_usuario2, $nombre){
        if(session_id() == ''){
            session_start();
        }

        $_SESSION['niu'] = $niu;
        $_SESSION['id_tipo_usuario'] = $id_tipo_usuario;
        $_SESSION['id_tipo_usuario2'] = $id_tipo_usuario2;
        $_SESSION['nombre'] = $nombre;
       
    }

    public static function closeSession(){
        if(session_id() == ''){
            session_start();
        }
        if(isset($_SESSION['niu'])){
            unset($_SESSION['niu']);
        }
        if(isset($_SESSION['id_tipo_usuario'])){
            unset($_SESSION['id_tipo_usuario']);
        }
        if(isset($_SESSION['id_tipo_usuario2'])){
            unset($_SESSION['id_tipo_usuario2']);
        }
        if(isset($_SESSION['nombre'])){
            unset($_SESSION['nombre']);
        }

        session_destroy();
    }

    public static function sessionStarted(){
        if(session_id() == ''){
            session_start();
        }
        if(isset($_SESSION['niu']) && isset($_SESSION['id_tipo_usuario']) && isset($_SESSION['id_tipo_usuario2']) && isset($_SESSION['nombre'])){
            return true;
        }else{
            return false;
        }
    }

}


?>