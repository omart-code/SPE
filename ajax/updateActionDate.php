<?php
include_once '../controllers/InternshipTaskController.inc.php';
include_once '../controllers/InternshipController.inc.php';
include_once '../app/Connection.inc.php'; 



$id_estancia = $_POST['estancia'];    
$id_tarea = $_POST['tarea']; 
$actionDate = $_POST['actionDate'];
$niu = $_POST['niu'];
$numActions  = $_POST['numActions'];

$fecha = date('Y-m-d');


Connection::openConnection();
$conn = Connection::getConnection();



//Segun el parametro fecha, si 1 llamas al modelo de actualizar fecha 1, si es el 2.. 2, 3.. 3..
if($actionDate == '1'){
    InternshipTaskController::updateTaskDate1($conn, $id_tarea, $id_estancia, $fecha);
   
}
if($actionDate == '2'){
    InternshipTaskController::updateTaskDate2($conn, $id_tarea, $id_estancia, $fecha);
}
if($actionDate == '3'){
    InternshipTaskController::updateTaskDate3($conn, $id_tarea, $id_estancia, $fecha);
   
}

$taskInternship = InternshipTaskController::getInternshipTask($conn, $id_tarea, $id_estancia);



//logica de finalizar tarea y estancia si hay 9 tareas hechas
switch ($numActions) {
    case 1:
       if($taskInternship->getNormalAction1Date() != "" ){
        InternshipTaskController::updateTaskDone(Connection::getConnection(),$taskInternship->getTaskId(), $taskInternship->getInternshipId());
       

       }
       $tasksDone = InternshipTaskController::getNumTasksDone($conn, $taskInternship->getInternshipId());
       if($tasksDone == "9"){
        InternshipController::updateInternshipDone(Connection::getConnection(), $taskInternship->getInternshipId());
      
        }
        break;
    case 2:
        if($taskInternship->getNormalAction1Date() != "" && $taskInternship->getNormalAction2Date() !="" ){
            InternshipTaskController::updateTaskDone(Connection::getConnection(), $taskInternship->getTaskId(), $taskInternship->getInternshipId());
            $tasksDone = InternshipTaskController::getNumTasksDone(Connection::getConnection(), $taskInternship->getInternshipId());
            
           }
           if($tasksDone == "9"){
            InternshipController::updateInternshipDone(Connection::getConnection(), $taskInternship->getInternshipId());
        }
        break;
    case 3:
        if($taskInternship->getNormalAction1Date() != "" && $taskInternship->getNormalAction2Date() !="" && $taskInternship->getNormalAction3Date() !="" ){
            InternshipTaskController::updateTaskDone(Connection::getConnection() ,$taskInternship->getTaskId(), $taskInternship->getInternshipId());
            $tasksDone = InternshipTaskController::getNumTasksDone(Connection::getConnection(), $taskInternship->getInternshipId());
           
           }
           if($tasksDone == "9"){
            InternshipController::updateInternshipDone(Connection::getConnection() , $taskInternship->getInternshipId());
        }
        break;
    }
 
 







?>