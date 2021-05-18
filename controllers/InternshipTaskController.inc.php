<?php
include_once '../models/InternshipTaskModel.inc.php';
include_once '../models/TaskModel.inc.php';

class InternshipTaskController {

    public function getInternshipTasksByPhase($conn, $id_estancia, $id_etapa){
        $internshipTasks = [];
        $internshipTasks = InternshipTaskModel::getInternshipTasksByPhase($conn, $id_estancia, $id_etapa);
        return $internshipTasks;
        
    }
    public function getInternshipTasksByInternshipId($conn, $id_estancia){
        $internshipTasks = [];
        $internshipTasks = InternshipTaskModel::getInternshipTasksByInternshipId($conn, $id_estancia);
        return $internshipTasks;
    }

       //funcion para actualizar la fecha prevista dada una estancia y una tarea
       public function updateTaskDate($conn, $id_tarea, $id_estancia, $fecha_prevista){
        InternshipTaskModel::updateTaskDate($conn, $id_tarea, $id_estancia, $fecha_prevista) ;
    }

    //funcion que añade por cada estancia 9 tareas asignadas a esa estancia
    public function insertInternshipTasksByInternship($conn, $id_estancia){
        InternshipTaskModel::insertInternshipTasksByInternship($conn, $id_estancia);
    }

    public function getInternshipTask($conn, $id_tarea, $id_estancia){
        $taskInternship = InternshipTaskModel::getInternshipTask($conn, $id_tarea, $id_estancia);
        return $taskInternship;
    }

/* 
    //calcula la fecha prevista de una tarea pasando las fechas de la estancia y el porcentaje
    public function calculateTaskDate($fecha_inicio, $fecha_fin, $porcentaje){
        $porcentaje = (int)$porcentaje;
        //Calculamos diferencia dias entre fecha inicio y fecha final
        $datetime1 = new DateTime($fecha_inicio);
        $datetime2 = new DateTime($fecha_fin);
        $interval = $datetime1->diff($datetime2);
        $dif = $interval->format('%a');
        $totalDays = (int)$dif;
       
        //calculamos el porcentaje respecto el total de dias
        $percentageDays = $totalDays * ($porcentaje*0.01);
        $percentageDays = (int)$percentageDays;
       
        //Hasta aqui tenemos el porcentaje correcto, en teoria hay que sumar los porcentaje days a la fecha inicio
    
         $fecha_prevista = date("Y-m-d",strtotime($fecha_inicio."+".$percentageDays."days"));
         return $fecha_prevista;
       //ESTA ES LA FECHA QUE TIENES QUE INSERTAR EN FECHA PREVISTA POR CADA TAREA!

    }
 */
    public function updateTasksDates($fecha_inicio, $fecha_fin, $tareas_estancia){
         foreach ($tareas_estancia as $tarea_estancia) {
            $task = TaskModel::getTaskById(Connection::getConnection(), $tarea_estancia-> getTaskId());
            $porcentaje = $task->getTaskPercentage();
            $porcentaje = (int)$porcentaje;
            //Calculamos diferencia dias entre fecha inicio y fecha final
            $datetime1 = new DateTime($fecha_inicio);
            $datetime2 = new DateTime($fecha_fin);
            $interval = $datetime1->diff($datetime2);
            $dif = $interval->format('%a');
            $totalDays = (int)$dif;
            $percentageDays = $totalDays * ($porcentaje*0.01);
            $percentageDays = (int)$percentageDays;
            //Hasta aqui tenemos el porcentaje correcto, en teoria hay que sumar los porcentaje days a la fecha inicio
            $fecha_prevista = date("Y-m-d",strtotime($fecha_inicio."+".$percentageDays."days"));
             //ESTA ES LA FECHA QUE TIENES QUE INSERTAR EN FECHA PREVISTA POR CADA TAREA!
            InternshipTaskController::updateTaskDate(Connection::getConnection(), $tarea_estancia-> getTaskId(), $tarea_estancia->getInternshipId(), $fecha_prevista);
         }
      
 

    }

    public function updateTaskDate1($conn, $id_tarea, $id_estancia, $fechaAction1){
        InternshipTaskModel::updateTaskDate1($conn, $id_tarea, $id_estancia, $fechaAction1);
    }

    public function updateTaskDate2($conn, $id_tarea, $id_estancia, $fechaAction2){
        InternshipTaskModel::updateTaskDate2($conn, $id_tarea, $id_estancia, $fechaAction2);
    }

    public function updateTaskDate3($conn, $id_tarea, $id_estancia, $fechaAction3){
        InternshipTaskModel::updateTaskDate3($conn, $id_tarea, $id_estancia, $fechaAction3);
    }

    public function updateTaskDone($conn, $id_tarea, $id_estancia){
        InternshipTaskModel::updateTaskDone($conn, $id_tarea, $id_estancia);
    }

    public function getNumTasksDone($conn, $id_estancia){
        $tasksDone = InternshipTaskModel::getNumTasksDone($conn, $id_estancia);
        return $tasksDone;
    }

 

}
?>


