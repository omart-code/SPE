<?php
include_once '../controllers/InternshipTaskController.inc.php';
include_once '../app/Connection.inc.php'; 

$id_estancia = $_POST['estancia'];    
$id_tarea = $_POST['tarea']; 
$actionDate = $_POST['actionDate'];
$niu = $_POST['niu'];

$fecha = date('Y-m-d');
echo $fecha; 

Connection::openConnection();
$conn = Connection::getConnection();


//Segun el parametro fecha, si 1 llamas al modelo de actualizar fecha 1, 2.. 2, 3.. 3..
if($actionDate == '1'){
    InternshipTaskController::updateTaskDate1($conn, $id_tarea, $id_estancia, $fecha);
   
}
if($actionDate == '2'){
    InternshipTaskController::updateTaskDate2($conn, $id_tarea, $id_estancia, $fecha);
}
if($actionDate == '3'){
    InternshipTaskController::updateTaskDate3($conn, $id_tarea, $id_estancia, $fecha);
   
}
 
 







?>