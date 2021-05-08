<?php
include_once '../models/InternshipTaskModel.inc.php';

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

    //calcula la fecha prevista de una tarea pasando las fechas de la estancia y el porcentaje
    public function calculateTaskDate($fecha_inicio, $fecha_fin, $porcentaje){
        $porcentaje = '5';//esta linea la podras quitar que es para setear un porcentaje cualquiera
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

    //funcion para actualizar la fecha prevista dada una estancia y una tarea
    public function updateTaskDate($conn, $id_tarea, $id_estancia, $fecha_prevista){
        Internship::updateTaskDate($conn, $id_tarea, $id_estancia, $fecha_prevista) ;
    }


}
?>


