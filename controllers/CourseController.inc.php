<?php
include_once '../models/CourseModel.inc.php';

class CourseController {

    //inserta curso en la bd
    public function insertCourse($conn, $nombre, $fecha_inicio, $fecha_fin){     
    CourseModel::insertCourse($conn, $nombre, $fecha_inicio, $fecha_fin);  
    }

    //devuelve los cursos de la bd
    public function getCourses($conn){
        $courses = [];
        $courses = CourseModel::getCourses($conn);
        return $courses;
            
    }

   

}
?>