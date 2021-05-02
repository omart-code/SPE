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

}
?>