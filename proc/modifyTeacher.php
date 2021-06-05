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


      $niuProfessor =  htmlentities( $_POST["niuProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      $nomProfessor =  htmlentities( $_POST["nomProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      $cognomProfessor =  htmlentities( $_POST["cognomProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      $emailProfessor =  htmlentities( $_POST["emailProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      $telefonProfessor =  htmlentities( $_POST["telefonProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      $departamentProfessor =  htmlentities( $_POST["departamentProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      $maximAlumnesProfessor =  htmlentities( $_POST["maximAlumnesProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8');
      
      if(filter_var($_POST['emailProfessor'], FILTER_VALIDATE_EMAIL)){

     
      Connection::openConnection(); 
     //modificar de profesores
     TeacherController::updateTeacher(Connection::getConnection(),$niuProfessor, $nomProfessor,
     $cognomProfessor, $emailProfessor, $telefonProfessor, $departamentProfessor);
     //modificar en usuarios
     UserController::updateTeacherByNiu(Connection::getConnection(), $niuProfessor,$nomProfessor,
     $cognomProfessor,$telefonProfessor, $emailProfessor, 1);
     DegreeCourseTeacherController::updateDegreeCourseTeacherMaxStudents(Connection::getConnection(), $_POST['cursoGrado'], $niuProfessor, $maximAlumnesProfessor);
     echo "<script>alert('Professor modificat correctament')</script>";      
      echo '<script>window.location.replace("'.TEACHERS.'")</script>';
      }else{
            echo "<script>alert('Professor no modificat perquè el correu es erroni')</script>";
            echo '<script>window.location.replace("'.TEACHERS.'")</script>';
      }

?>