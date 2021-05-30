<?php
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/DegreeCourseTeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';

      
      Connection::openConnection(); 
     //modificar de profesores
     TeacherController::updateTeacher(Connection::getConnection(),$_POST['niuProfessor'],$_POST['nomProfessor'],
     $_POST['cognomProfessor'], $_POST['emailProfessor'], $_POST['telefonProfessor'], $_POST['departamentProfessor']);
     //modificar en usuarios
     UserController::updateTeacherByNiu(Connection::getConnection(), $_POST['niuProfessor'],$_POST['nomProfessor'],
     $_POST['cognomProfessor'],$_POST['telefonProfessor'], $_POST['emailProfessor'], 1);
     DegreeCourseTeacherController::updateDegreeCourseTeacherMaxStudents(Connection::getConnection(), $_POST['cursoGrado'], $_POST['niuProfessor'], $_POST['maximAlumnesProfessor']);
    
      echo '<script>window.location.replace("'.TEACHERS.'")</script>';
  

?>