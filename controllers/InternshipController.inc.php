<?php
include_once '../models/UserModel.inc.php';
include_once '../models/InternshipModel.inc.php';
include_onCe '../app/Connection.inc.php';

Connection::openConnection(); 
class InternshipController {

    public function getStudentInternship($conn, $niu_estudiante){
        
        $internship = InternshipModel::getStudentInternship($conn, $niu_estudiante);

        return $internship;
    }

    public function getTeacherInternships($conn, $niu_profesor){
        $internships = InternshipModel::getTeacherInternships($conn, $niu_profesor);

        return $internships;
    }

    /* public function getUsersModificados($conn){
        
        $listaUsuarios[] = UserModel::getUsers($conn);

        $listaUsuarios[0] = null;

        return $listaUsuarios;
    } */

}
?>