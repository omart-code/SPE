<?php

include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/DegreeCourseTeacherController.inc.php';
include_once '../controllers/DegreeDepartmentController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';


    Connection::openConnection();
    $teacher = DegreeCourseTeacherController::getTeacherByNiuAndDegreeCourse(Connection::getConnection(), $_POST['grauCursSelec'], $_POST['profesor']);
    if($teacher == null){
        DegreeCourseTeacherController::insertDegreeCourseTeacher(Connection::getConnection(), $_POST['grauCursSelec'], $_POST['profesor'], $_POST['maxEstudiants']);
    }
   
    echo '<script>window.location.replace("'.TEACHERS.'")</script>';
  



?>