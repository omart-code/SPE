<?php
include_once '../models/TeacherModel.inc.php';

class TeacherController {

    public function insertTeacher($conn, $nombre, $apellido, $niu_profesor,  $telefono, $email, $id_departamento){
        
    TeacherModel::insertTeacher($conn, $nombre, $apellido, $niu_profesor,  $telefono, $email, $id_departamento);

        
    }

}
?>