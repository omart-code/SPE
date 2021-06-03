<?php 

include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/DegreeDepartmentController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';
?>


    
        
      <?php
     
            
            Connection::openConnection(); 
            CoordinatorController::insertCoordinator(Connection::getConnection(), $_POST['professorSelec'],$_POST['grauSelec']);
            //inserto en usuarios como coordinador.
            //obtengo los datos de usuario por el  niu profesor
            $user = UserController::getUserByNiuAndType(Connection::getConnection(), $_POST['professorSelec'], 1 );
           //actualizo el campo de tipo 2 de ese profesor y pongo un 3
            UserController::updateTeacherToCoord(Connection::getConnection(), $_POST['professorSelec'], 1);
            echo "<script>alert('Coordinador/a de grau afegit/da correctament')</script>";
            echo '<script>window.location.replace("'.COORDINATORS.'")</script>';
       
       ?>