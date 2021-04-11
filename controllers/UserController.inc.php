<?php
include_once '../models/UserModel.inc.php';

class UserController {

    public function getUsers($conn){
        
        $userList[] = UserModel::getUsers($conn);

        return $userList;
    }

   public function insertUser($conn, $niu, $nombre, $apellido, $telefono, $email, $id_tipo_usuario){
       UserModel::insertUser($conn, $niu, $nombre, $apellido, $telefono, $email, $id_tipo_usuario);
   }

}
?>