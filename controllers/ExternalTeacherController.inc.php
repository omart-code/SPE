<?php
include_once '../models/ExternalTeacherModel.inc.php';

class ExternalTeacherController {

    public function updateExternalTeacherById($conn, $id_tutor_externo, $nombre, $apellido, $email, $telefono){
   
    ExternalTeacherModel::updateExternalTeacherById($conn, $id_tutor_externo, $nombre, $apellido, $email, $telefono);
   
        
    }

    public function getPublicComments($conn, $id_estancia){
        $comments = [];
        $comments = CommentModel::getPublicComments($conn, $id_estancia);
        return $comments;

    }

}
?>

 