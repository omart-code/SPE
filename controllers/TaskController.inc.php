<?php
include_once '../models/TaskModel.inc.php';

class TaskController {

    public function getTasksByPhase($conn, $id_etapa){
        $tasks = [];
        $tasks = TaskModel::getTasksByPhase($conn, $id_etapa);
        return $tasks;
        
    }

    public function getTasksByDegreeCourse($conn){
        $tasks = [];
        $tasks = TaskModel::getTasksByDegreeCourse($conn);
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

    public function insertTasksByDegreeCourse($conn, $id_curso_grado){
        TaskModel::insertTasksByDegreeCourse($conn, $id_curso_grado);
    }


}
?>