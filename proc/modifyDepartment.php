<?php
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/DegreeDepartmentController.inc.php';
include_once '../controllers/DegreeCourseTeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';


     
            
            Connection::openConnection(); 
           //assignar un departamento a un grado
            $depart = DegreeDepartmentController::getDepartmentsByDegreeAndDepartment(Connection::getConnection(),$_POST['grau'], html_entity_decode($_POST['departament'], ENT_QUOTES, 'UTF-8'));
            if( $depart == null && $_POST['departament'] != null && $_POST['grau'] != null){
                DegreeDepartmentController::insertDegreeDepartment(Connection::getConnection(), $_POST['departament'], $_POST['grau'] );
                echo "<script>alert('Departament assignat correctament')</script>";
            }
          
          
          
            echo '<script>window.location.replace("'.DEPARTMENTS.'")</script>';
   
       ?>