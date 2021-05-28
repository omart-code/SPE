<?php
     include_once '../includes/doc-declaration.inc.php'; 
     include_once '../app/Connection.inc.php';
     include_once '../controllers/TeacherController.inc.php';
     include_once '../controllers/UserController.inc.php';
     include_once '../controllers/DepartmentController.inc.php';
     include_once '../controllers/CoordinatorController.inc.php';
     include_once '../controllers/DegreeCourseController.inc.php';
     include_once '../controllers/DegreeCourseTeacherController.inc.php';
     include_once '../app/Redirection.inc.php';
     include_once '../includes/navbar.inc.php';

            Connection::openConnection(); 
            $department = DepartmentController::getDepartmentByName(Connection::getConnection(), $_POST['departamentProfessor']);
            if($department != null){
                $departmentId = $department->getDepartmentId();
           
                TeacherController::insertTeacher(Connection::getConnection(), $_POST["nomProfessor"], $_POST["cognomProfessor"], $_POST["niuProfessor"], 
                 $_POST["telefonProfessor"], $_POST["emailProfessor"], $departmentId);
                 UserController::insertUser(Connection::getConnection(), $_POST["niuProfessor"], $_POST["nomProfessor"], $_POST["cognomProfessor"],
                 $_POST["telefonProfessor"], $_POST["emailProfessor"], 1, $_POST['contrasenyaProfessor']);
                 //Insertar ahora el profesor curso grado
                DegreeCourseTeacherController::insertDegreeCourseTeacher(Connection::getConnection(),$_POST['cursoGrado'], $_POST["niuProfessor"]);
    
                 echo '<script>window.location.replace("'.TEACHERS.'")</script>';
            }
           
    
          
      
      
    ?>