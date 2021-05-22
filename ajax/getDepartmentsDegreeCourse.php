<?php 
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../app/Connection.inc.php'; 

$cursoGrado = $_POST['cursogrado'];
Connection::openConnection();
$gradoCurso = DegreeCourseController::getDegreeCourseById(Connection::getConnection(), $cursoGrado);
$grado = $gradoCurso->getDegreeCourseDegree();


$departaments = DepartmentController::getDepartmentByDegree(Connection::getConnection(), $grado);
 ?>

<option value="">Selecciona un departament</option>
<?php

	foreach($departaments as $department) {
?>
	<option value="<?php echo $department["id_departamento"]; ?>"><?php echo $department["nombre"]; ?></option>
<?php
	}
?>
