<?php

class ControlSession{

    public static function startSession($niu, $id_tipo_usuario){
        if(session_id() == ''){
            session_start();
        }

        $_SESSION['niu'] = $niu;
        $_SESSION['id_tipo_usuario'] = $id_tipo_usuario;
       
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

        session_destroy();
    }

    public static function sessionStarted(){
        if(session_id() == ''){
            session_start();
        }
        if(isset($_SESSION['niu']) && isset($_SESSION['id_tipo_usuario'])){
            return true;
        }else{
            return false;
        }
    }

}


?>