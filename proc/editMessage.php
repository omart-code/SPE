<?php
include_once '../app/Connection.inc.php';
include_once '../controllers/TeacherMessageController.inc.php';

$id_tarea = $_POST['id_tarea'];
$niu = $_POST['niu'];
$mensaje = $_POST['mensaje'];

Connection::openConnection();
$teacherMessage = TeacherMessageController::getTeacherMessageByNum(Connection::getConnection(),$id_tarea,$niu);

if($teacherMessage != null){
 TeacherMessageController::updateTeacherMessageByNum(Connection::getConnection(),$id_tarea,htmlentities($mensaje, ENT_COMPAT, 'UTF-8') , $niu);
   
 }else{
 TeacherMessageController::insertTeacherMessage(Connection::getConnection(), $id_tarea,htmlentities($mensaje, ENT_COMPAT, 'UTF-8'),$niu);
    
 }



?>