<?php
include_once '../models/TaskModel.inc.php';

class TaskController {

    public function getTasksByPhase($conn, $id_etapa){
        $tasks = [];
        $tasks = TaskModel::getTasksByPhase($conn, $id_etapa);
        return $tasks;
        
    }

    public function getTaskById($conn, $id_tarea){ 
        $task = TaskModel::getTaskById($conn, $id_tarea);
        return $task;
    }
    
    public function getTasksActions($conn, $id_tarea){
        $actions = TaskModel::getTasksActions($conn, $id_tarea);
        return $actions;
    }


}
?>