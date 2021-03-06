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

    public function getExternalTeacherCompany($conn, $id_empresa){
        $empresa = ExternalTeacherModel::getExternalTeacherCompany($conn, $id_empresa);
        return $empresa;
    }

    public function updateCompanyNameById($conn, $id_empresa, $nombre){
        CompanyModel::updateCompanyNameById($conn, $id_empresa, $nombre);
    }

    public function insertTeacher($conn, $nombre, $apellido, $telefono, $email, $id_empresa){
        ExternalTeacherModel::insertTeacher($conn, $nombre, $apellido, $telefono, $email, $id_empresa);
    }

    public function getExternalTeacherByName($conn, $nombre, $apellido){
        $teacher = ExternalTeacherModel::getExternalTeacherByName($conn, $nombre, $apellido);
        return $teacher;
    }

    public function checkExternalTeacher($conn, $email){
        $teacher = ExternalTeacherModel::checkExternalTeacher($conn, $email);
        return $teacher;
    }

}
?>

 