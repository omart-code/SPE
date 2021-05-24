<?php
include_once '../controllers/InternshipController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/StudentController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/InternshipController.inc.php';
include_once '../controllers/InternshipTaskController.inc.php';
include_once '../controllers/TaskController.inc.php';
include_once '../controllers/DegreeCourseTeacherController.inc.php';
include_once '../app/Connection.inc.php'; 

$cursoGrado = $_POST['cursoGrado'];
$niuEstudiant = $_POST['niuEstudiant'];
$nomEstudiant = $_POST['nomEstudiant'];
$cognomEstudiant =  $_POST['cognomEstudiant'];
$profesorSelec = $_POST['profesorSelec'];
$fechaInicio = $_POST['fechaInicio'];
$fechaFinal =  $_POST['fechaFinal'];


?>

<!--     LOGICA DEL MODAL DE INSERTAR ESTANCIA -->
<?php 

    Connection::openConnection();
   //Inserta en estancias la estancia
   InternshipController::insertInternship(Connection::getConnection(),$niuEstudiant,$profesorSelec, 
   $fechaInicio, $fechaFinal, $cursoGrado);

    //Cojo el curso i el grado a partir del curso_grado
    $degreeCourse = DegreeCourseController::getDegreeCourseById(Connection::getConnection(), $cursoGrado);
    $grado = $degreeCourse-> getDegreeCourseDegree();
    $curso = $degreeCourse-> getDegreeCourseCourse();
  
   //Inserta el estudiante
    StudentController::insertStudent(Connection::getConnection(), $niuEstudiant, $nomEstudiant, $cognomEstudiant, $grado);
    //Inserta este estudiante en los usuarios
    UserController::insertUser(Connection::getConnection(), $niuEstudiant, $nomEstudiant, $cognomEstudiant, '', '', 2);
    //Recupera la ultima estancia introducida gracias al niu estudiante
    $internship = InternshipController::getStudentInternship(Connection::getConnection(), $niuEstudiant);
    //Creo sus 9 tareas estancia para esa estancia
    InternshipTaskController::insertInternshipTasksByInternship(Connection::getConnection(), $internship->getIdInternship());
    //Recupero sus 9 tareas acabadas de crear
    $internshipTasks= InternshipTaskController::getInternshipTasksByInternshipId(Connection::getConnection(),$internship->getIdInternship());
    //Calculo sus fechas previstas y las actualizo
    InternshipTaskController::updateTasksDates($internship->getNormalStartDate(), $internship->getNormalEndDate(), $internshipTasks);
    /* //genero sus 9 tareas para su estancia
    $tasksByDegree = TaskController::getTasksByDegreeCourse(Connection::getConnection(), $cursoGrado);
    if($tasksByDegree == null){ //crea las tareas solo no hay tareas ya para ese curso grado
      TaskController::insertTasksByDegreeCourse(Connection::getConnection(), $internship->getIdDegreeCourse());
    } */
   
    //inserto el profesor en profesor curso grado
    DegreeCourseTeacherController::insertDegreeCourseTeacher(Connection::getConnection(),$internship->getIdDegreeCourse(),$internship-> getNiuTeacher());

    

  /*   QUEDA HACER UN MODAL DE LOADING Y QUE COMPRUEBE SI REALMENTE SE PUEDE INSERTAR LA ESTANCIA Y MOSTRAR UN ALERT DE QUE NO SE HA PODIDO */
   

?>