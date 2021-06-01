<?php
include_once '../models/TeacherMessageModel.inc.php';

class TeacherMessageController {

    public function getTeacherMessageByNum($conn, $id_tarea, $niu_profesor){
        
        $message = TeacherMessageModel::getTeacherMessageByNum($conn, $id_tarea, $niu_profesor);
        return $message;
        
    }

    public function insertTeacherMessage($conn, $num_tarea, $mensaje, $niu_profesor){
        TeacherMessageModel::insertTeacherMessage($conn, $num_tarea, $mensaje, $niu_profesor);
    }

    public function updateTeacherMessageByNum($conn, $num_tarea, $mensaje, $niu_profesor){
        TeacherMessageModel::updateTeacherMessageByNum($conn, $num_tarea, $mensaje, $niu_profesor);
    }

    public function restoreMessageByTask($conn, $num_tarea, $niu_profesor, $id_curso_grado){
        TeacherMessageModel::restoreMessageByTask($conn, $num_tarea, $niu_profesor, $id_curso_grado);
    }


}
?>
