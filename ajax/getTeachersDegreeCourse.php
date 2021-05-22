<?php 
include_once '../controllers/TeacherController.inc.php';
include_once '../app/Connection.inc.php'; 

$cursoGrado = $_POST['cursogrado'];

Connection::openConnection();
$teachers = TeacherController::getTeachersInfo(Connection::getConnection(), $cursoGrado);  ?>

<option value="">Selecciona un professor</option>
<?php

	foreach($teachers as $teacher) {
?>
	<option value="<?php echo $teacher["niu_profesor"]; ?>"><?php echo $teacher["nombre"]. ' ' . $teacher["apellido"] ?></option>
<?php
	}
?>


   

?>