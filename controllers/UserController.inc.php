<?php
include_once '../models/UserModel.inc.php';

class UserController {

    public function getUsers($conn){
        
        $userList[] = UserModel::getUsers($conn);

        return $userList;
    }

    /* public function getUsersModificados($conn){
        
        $listaUsuarios[] = UserModel::getUsers($conn);

        $listaUsuarios[0] = null;

        return $listaUsuarios;
    } */

}
?>