<?php
include_once '../models/TeacherModel.inc.php';

class TeacherController {

    public function insertTeacher($conn, $nombre, $apellido, $niu_profesor,  $telefono, $email, $id_departamento){
        
    TeacherModel::insertTeacher($conn, $nombre, $apellido, $niu_profesor,  $telefono, $email, $id_departamento);

        
    }

    public function getTeacherByNiu($conn, $niu_profesor){
       $teacher = TeacherModel::getTeacherByNiu($conn, $niu_profesor);
       return $teacher;
    }

    public function updateTeacher($conn, $niu_profesor, $nombre, $apellido, $email, $telefono, $id_departamento){
        TeacherModel::updateTeacher($conn, $niu_profesor, $nombre, $apellido, $email, $telefono, $id_departamento);
    }

    public function getTeachers($conn){
        
        $teachers = TeacherModel::getTeachers($conn);
        return $teachers;
            
    }

    public function getTeachersInfo($conn, $id_curso_grado){
        $teachersInfo = TeacherModel::getTeachersInfo($conn, $id_curso_grado);
        return $teachersInfo;
    }

    public function getNumStudents($conn, $niu_profesor, $id_curso_grado){
        $numStudents = TeacherModel::getNumStudents($conn, $niu_profesor, $id_curso_grado);
        return $numStudents;
    }

    public function updateNumStudents($conn, $niu_profesor, $id_curso_grado, $numStudents){
        TeacherModel::updateNumStudents($conn, $niu_profesor, $id_curso_grado, $numStudents);
    }

}
?>