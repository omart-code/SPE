<?php

include_once '../controllers/TeacherMessageController.inc.php';
include_once '../app/Connection.inc.php'; 

$id_tarea=$_POST['id_tarea'];
$niu=$_POST['niu'];
$cursoGrado=$_POST['cursoGrado'];
$niuEstudiante=$_POST['niuEstudiante'];

    Connection::openConnection();
    TeacherMessageController::restoreMessageByTask(Connection::getConnection(), $id_tarea, $niu, $cursoGrado);
    echo '<script>window.location.replace("'.TASK."?task=".$id_tarea."&niu=".$niuEstudiante.'")</script>';


?>