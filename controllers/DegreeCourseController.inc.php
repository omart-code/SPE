<?php
include_once '../models/DegreeCourseModel.inc.php';

class DegreeCourseController {

    public function insertDegreeCourse($conn, $id_curso, $id_grado, $nombre, $activo){
        
        DegreeCourseModel::insertDegreeCourse($conn, $id_curso, $id_grado, $nombre, $activo);
     
    }

    public function getDegreeCoursesByDegree($conn, $id_grado){
       $degrees = DegreeCourseModel::getDegreeCoursesByDegree($conn, $id_grado);
       return $degrees;
    }

    public function getDegreeCoursesById($conn, $id_cursos_grado){
        foreach($id_cursos_grado as $id_curso_grado){
           $degree = DegreeCourseModel::getDegreeCoursesById($conn, $id_curso_grado);
           $degrees[] = $degree;
        }
       
        return $degrees;
    }

    public function getDepartmentByDegree($conn, $niu_profesor){
        $degreeCourses = DegreeCourseModel::getDepartmentByDegree($conn, $niu_profesor);
        return $degreeCourses;
    }

}
?>