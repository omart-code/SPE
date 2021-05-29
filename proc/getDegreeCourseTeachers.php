<?php
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/InternshipController.inc.php';
include_once '../controllers/TaskController.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/InternshipTaskController.inc.php';
include_once '../controllers/StudentController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/DegreeCourseTeacherController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
$cursoGrado = $_POST['cursoGrado'];
?>
                       
                        <label for="exampleFormControlTextarea1" class="form-label"><b>Profesor:</b></label>
                       
                        <select  name="profesorSelec" class="form-control" aria-label=".form-select-lg example">
                            <?php Connection::openConnection();
                                $teachers = TeacherController::getTeachersInfo(Connection::getConnection(), $cursoGrado) ?>
                                    <option selected>Sel·lecciona un professor</option>
                                    <?php foreach ($teachers as $teacher) { ?>
                                    <option value="<?php echo $teacher['niu_profesor']?>"><?php echo $teacher['nombre'].' '. $teacher['apellido']?></option>
                                <?php }?>
                        </select>



