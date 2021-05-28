<?php
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../app/Connection.inc.php'; 

$id_departamento = $_POST['departament'];
$grado = $_POST['grado'];



Connection::openConnection();
$departament = DepartmentController::getDepartmentById(Connection::getConnection(), $id_departamento);


 ?>
 <div class="mb-3">
<input type="text" class="form-control" name="idDepartament" hidden value="<?php echo $departament->getDepartmentId()?>">
</div>
<label for="exampleFormControlInput1" class="form-label"><b>Modifica les dades actuals del departament</b></label>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"><b>Nom</b></label>
<input type="text" class="form-control" name="nomDepartament" value="<?php echo $departament->getDepartmentName()?>">
</div>
<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label"><b>Sigles</b></label>
<input type="text" class="form-control" name="siglesDepartament"value="<?php echo $departament->getDepartmentAcronym()?>" ></input>
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"><b>Identificador</b></label>
<input type="text" class="form-control" name="identificadorDepartament" value="<?php echo $departament->getDepartmentIdentificator()?>">
</div>

</div>