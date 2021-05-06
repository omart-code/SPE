<?php
include_once '../models/UserModel.inc.php';
include_once '../models/InternshipModel.inc.php';
include_once '../models/ExternalTeacherModel.inc.php';
include_once '../models/TeacherModel.inc.php';
include_once '../models/CompanyModel.inc.php';
include_once '../models/StudentModel.inc.php';
include_once '../app/Connection.inc.php';


class InternshipController {
    //Devuelve todas las estancias
    public function getInternships($conn){
        
        $internships = InternshipModel::getInternships($conn);

        return $internships;
    }
    //Inserta una nueva estancia, aunque no todos los campos
    public function insertInternship($conn, $niu_estudiante, $niu_profesor, $fecha_inicio, $fecha_fin, $id_curso_grado){
        InternshipModel::insertInternship($conn, $niu_estudiante, $niu_profesor, $fecha_inicio, $fecha_fin, $id_curso_grado);
    }

    //Devuelve los nombres y apellidos de los alumnos que hacen estancias de un profesor
    public function getInfoInternshipsByTeacher($conn, $niu_profesor){
        $infos = InternshipModel::getInfoInternshipsByTeacher($conn, $niu_profesor);
        return $infos;
    }

    //Devuelve los nombres y apellidos de los alumnos que hacen estancias 
    public function getInfoInternships($conn, $id_curso_grado){
        $infos = InternshipModel::getInfoInternships($conn, $id_curso_grado);
        return $infos;
    }

    //Actualiza las fechas de estancia de un estudiante en funcion del niu
    function updateInternshipDates($conn, $niu_estudiante, $fecha_inicio, $fecha_fin){
        InternshipModel::updateInternshipDates($conn, $niu_estudiante, $fecha_inicio, $fecha_fin);
    }

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

    //Devuelve el porcentaje de progreso a partir de las fechas
    public static function calculatePercentage($conn, $niu_estudiante){
        $internship = InternshipModel::getStudentInternship($conn, $niu_estudiante);
        //Cogemos las fechas bien formateadas de las estancias
        $startDate = $internship -> getStartDate();
        $endDate = $internship ->getEndDate();
        //Las pasamos a objeto Datetime para poder calcular los dias de diferencia
        $datetime1 = new DateTime($startDate);
        $datetime2 = new DateTime($endDate);
        $interval = $datetime1->diff($datetime2);
        $dif = $interval->format('%a');
        $totalDays = (int)$dif;
        //Obtenemos fecha actual
        $day = date("d");
        $month = date("m");
        $year = date("Y");
        $currentDate = "$day-$month-$year";
        $currentDate = new DateTime($currentDate);
        //Calculamos la diferencia entre el dia actual y el dia que empezaste
        $int = $currentDate->diff($datetime1);
        $difCurrent = $int->format('%a');
        $restDays = (int)$difCurrent;
        //Creo que es asi
        $percentage = $restDays / $totalDays *100;
        $percentage = round($percentage, 2);
        return $percentage;
    }

   


}
?>