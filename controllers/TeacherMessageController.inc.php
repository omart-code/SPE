<?php
include_once '../models/TeacherMessageModel.inc.php';

class TeacherMessageController {

    public function getTeacherMessageById($conn, $id_tarea, $niu_profesor){
        
        $message = TeacherMessageModel::getTeacherMessageById($conn, $id_tarea, $niu_profesor);
        return $message;
        
    }

    public function updateTeacherMessageByTask($conn, $id_tarea, $mensaje, $niu_profesor){
        TeacherMessageModel::updateTeacherMessageByTask($conn, $id_tarea, $mensaje, $niu_profesor);
    }

    public function restoreMessageByTask($conn, $id_tarea){
        TeacherMessageModel::restoreMessageByTask($conn, $id_tarea);
    }


}
?>
