<?php
include_once '../models/UserModel.inc.php';
include_once '../models/InternshipModel.inc.php';
include_once '../models/ExternalTeacherModel.inc.php';
include_once '../models/TeacherModel.inc.php';
include_once '../models/CompanyModel.inc.php';
include_once '../models/StudentModel.inc.php';
include_once '../app/Connection.inc.php';


class InternshipController {

    //Devuelve los datos de una estancia de un estudiante
    public function getStudentInternship($conn, $niu_estudiante){
        
        $internship = InternshipModel::getStudentInternship($conn, $niu_estudiante);

        return $internship;
    }

    //Devuelve las estancias que supervisa un profesor
    public function getTeacherInternships($conn, $niu_profesor){
        $internships = InternshipModel::getTeacherInternships($conn, $niu_profesor);

        return $internships;
    }
    
    //Devuelve los datos de un profesor externo
    public function getTeacherExternal($conn, $id_tutor_externo){
         $teacher = ExternalTeacherModel::getExternalTeacher($conn, $id_tutor_externo);
         return $teacher;
    }

    //Devuelve los datos de un profesor academico
    public function getInternshipTeacher($conn, $niu_profesor){
        $teacher = TeacherModel::getTeacherByNiu($conn, $niu_profesor);

        return $teacher;
    }

    //Devuelve los datos de una empresa
    public function getInternshipCompany($conn, $id_empresa){
        $company = CompanyModel::getCompanyById($conn, $id_empresa);

        return $company;
    }

    //Devuelve los datos de un estudiante
    public function getInternshipStudent($conn, $niu_estudiante){
        $student = StudentModel::getStudentByNiu($conn, $niu_estudiante);

        return $student;
    }

   


}
?>