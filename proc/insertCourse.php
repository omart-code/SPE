<?php
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/CourseController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/TaskController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';


     
        Connection::openConnection(); 
        //inserto un curso en la tabla cursos
       
        CourseController::insertCourse(Connection::getConnection(), $_POST["nomCurs"], $_POST["dataIniciCurs"], $_POST["dataFiCurs"]);
        //obtengo grado seleccioando en el option
        $degree = DegreeController::getDegreeById(Connection::getConnection(), $_POST["grauSelec"]);
      
        //obtengo id  del curso antes insertado
        $course = CourseController:: getCourseByNameAndDate(Connection::getConnection(), $_POST["nomCurs"], $_POST["dataIniciCurs"], $_POST["dataFiCurs"]);
        $courseId = $course ->getCourseId();
        //genero la concatenación para el nombre del curso_grado
        $degreeCourseName = $degree->getDegreeName(). ' / ' . $course->getCourseName();
        //inserto curso grado
        DegreeCourseController::insertDegreeCourse(Connection::getConnection(), $courseId, $degree->getDegreeId(), $degreeCourseName, 0);
        //Obtengo el curso grado acabado de crear
        $degreeCourse = DegreeCourseController::getDegreeCourseByCourseAndDegree(Connection::getConnection(), $courseId,  $degree->getDegreeId());
        //Para este curso grado, añado 9 tareas
        TaskController::insertTasksByDegreeCourse(Connection::getConnection(),  $degreeCourse->getDegreeCourseId());
        echo "<script>alert('Curs afegit correctament correctament')</script>";
        echo '<script>window.location.replace("'.COURSES.'")</script>';
         
      
       ?>