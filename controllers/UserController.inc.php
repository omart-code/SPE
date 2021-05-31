<?php
include_once '../models/UserModel.inc.php';

class UserController {

    public function getUsers($conn){
        
        $userList[] = UserModel::getUsers($conn);

        return $userList;
    }

    public function getUserByNiu($conn, $niu, $pass){
        $user = UserModel::getUserByNiu($conn, $niu, $pass);
        return $user;
    }

    public function getUserByNiuAndType($conn, $niu, $tipo){
        $user = UserModel::getUserByNiuAndType($conn, $niu, $tipo);
        return $user;
    }

   public function insertUser($conn, $niu, $nombre, $apellido, $telefono, $email, $id_tipo_usuario, $password){
       UserModel::insertUser($conn, $niu, $nombre, $apellido, $telefono, $email, $id_tipo_usuario, $password);
   }

   public function updateStudentByNiu($conn, $niu, $nombre, $apellido,  $telefono, $email, $id_tipo_usuario){
       UserModel::updateStudentByNiu($conn, $niu, $nombre, $apellido,  $telefono, $email, $id_tipo_usuario);
   }

   public function updateTeacherByNiu($conn, $niu, $nombre, $apellido,  $telefono, $email, $id_tipo_usuario){
       UserModel::updateTeacherByNiu($conn, $niu, $nombre, $apellido,  $telefono, $email, $id_tipo_usuario);
   }

   public function updateTeacherToCoord($conn, $niu, $id_tipo_usuario){
       UserModel::updateTeacherToCoord($conn, $niu, $id_tipo_usuario);
   }

}
?>