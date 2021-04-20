<?php
include_once '../models/TaskModel.inc.php';

class TaskController {

    public function getTasksByPhase($conn, $id_etapa){
        $tasks = [];
        $tasks = TaskModel::getTasksByPhase($conn, $id_etapa);
        return $tasks;
        
    }


}
?>