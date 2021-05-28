<?php
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/DegreeDepartmentController.inc.php';
include_once '../app/Connection.inc.php'; 

$niuProfesor = $_POST['niuProfesor'];
$grado = $_POST['grado'];


Connection::openConnection();
$teacher = TeacherController::getTeacherByNiu(Connection::getConnection(), $niuProfesor);
$departaments = DegreeDepartmentController::getDepartmentsByDegree(Connection::getConnection(), $grado);

 ?>
<label for="exampleFormControlInput1" class="form-label"><b>Modifica les dades actuals del professor</b></label>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"><b>Nom</b></label>
<input type="text" class="form-control" name="nomProfessor" value="<?php echo $teacher->getTeacherName()?>">
</div>
<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label"><b>Cognom/s</b></label>
<input type="text" class="form-control" name="cognomProfessor"value="<?php echo $teacher->getTeacherSurname()?>" ></input>
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"><b>NIU</b></label>
<input type="text" class="form-control" name="niuProfessor" value="<?php echo $teacher->getTeacherNiu()?>">
</div>
<div class="mb-3">
<label for="exampleFormControlTextarea1" class="form-label"><b>E-mail</b></label>
<input type="email" class="form-control" name="emailProfessor" value="<?php echo $teacher->getTeacherEmail()?>"></input>
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"><b>Telèfon</b></label>
<input type="text" class="form-control" name="telefonProfessor" value="<?php echo $teacher->getTeacherTelf()?>">
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label"><b>Departament</b></label>
<select name="departamentProfessor" class="form-control" aria-label=".form-select-lg example">
                        <?php 
                       
                            foreach ($departaments as $key => $departament) { ?>
                                    <option <?php if($departament['id_departamento'] == $teacher->getTeacherDepartment()){
                                        echo 'selected';
                                    } ?> value="<?php echo $departament['id_departamento'] ?>"> <?php echo  $departament['nombre'] ?></option>
                                
                        <?php  } ?>
                    
                        </select>
</div>

