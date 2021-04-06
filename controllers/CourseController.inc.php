<?php
include_once '../models/CourseModel.inc.php';

class CourseController {

    public function insertCourse($conn, $nombre, $fecha_inicio, $fecha_fin){
        
    CourseModel::insertCourse($conn, $nombre, $fecha_inicio, $fecha_fin);

        
    }

}
?>