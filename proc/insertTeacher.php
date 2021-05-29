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
           
                TeacherController::insertTeacher(Connection::getConnection(),htmlentities($_POST["nomProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8'),htmlentities( $_POST["cognomProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8'), 
                htmlentities( $_POST["niuProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8'), htmlentities( $_POST["telefonProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                htmlentities( $_POST["emailProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8') , $departmentId);
                 UserController::insertUser(Connection::getConnection(),  htmlentities( $_POST["niuProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8'), 
                 htmlentities($_POST["nomProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                 htmlentities( $_POST["cognomProfessor"],ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                 htmlentities( $_POST["telefonProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                 htmlentities( $_POST["emailProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8') , 1,  htmlentities( $_POST['contrasenyaProfessor'], ENT_QUOTES | ENT_HTML5, 'UTF-8'));
                 //Insertar ahora el profesor curso grado
                //DegreeCourseTeacherController::insertDegreeCourseTeacher(Connection::getConnection(), htmlentities($_POST['cursoGrado'], ENT_QUOTES | ENT_HTML5, 'UTF-8'),  htmlentities( $_POST["niuProfessor"], ENT_QUOTES | ENT_HTML5, 'UTF-8'), 0);
     
                 echo '<script>window.location.replace("'.TEACHERS.'")</script>';
            }
           
    
          
      
      
    ?>