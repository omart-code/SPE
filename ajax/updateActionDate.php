<?php
include_once '../controllers/InternshipTaskController.inc.php';
include_once '../app/Connection.inc.php'; 

$id_estancia = $_POST['estancia'];    
$id_tarea = $_POST['tarea']; 
$actionDate = $_POST['actionDate']; 
$currentDate = $_POST['currentDate']; 





//Segun el parametro fecha, si 1 llamas al modelo de actualizar fecha 1, 2.. 2, 3.. 3..
        if($actionDate == '1'){
            InternshipTaskController::updateTaskDate1(Connection::getConnection(), $id_tarea, $id_estancia, $currentDate);
        }
        if($actionDate == '2'){
            InternshipTaskController::updateTaskDate2(Connection::getConnection(), $id_tarea, $id_estancia, $currentDate);
        }
        if($actionDate == '3'){
            InternshipTaskController::updateTaskDate3(Connection::getConnection(), $id_tarea, $id_estancia, $currentDate);
        }
 
 







?>