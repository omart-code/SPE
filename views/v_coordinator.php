<?php 
include_once '../includes/libraries.inc.php';
$title = 'COORDINATOR';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/InternshipController.inc.php';
include_once '../controllers/TaskController.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/InternshipTaskController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
?>
<?php include_once '../includes/navbar.inc.php'; ?>
    
        
<div class="container">
<br>
    <h1>Estades del curs</h1>
    <div class="container text-right">
        <a  role="button" class="btn btn-success" data-toggle="modal" data-target="#modalEstancia" style="color:white;">Afegir nova estada </a>
    </div>
    <br>
    <br>
    <?php
    Connection::openConnection();
    $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
    ?>

    <?php if(isset($_POST['cursoEstancias'])){
        //SI SELECTOR DE CURSO GRADO SELECCIONADO, PONER $_SESSION['curso'] = nombreCurso, y poner activo en la base de datos
    }
    
    ?>
    
         <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <select id="cursosEstancias" class="selectpicker form-control" name="cursoEstancias" required="true">
            
                <?php 
            
                Connection::openConnection();
                $degreeCoursesByDegree = DegreeCourseController::getDegreeCoursesByDegree(Connection::getConnection(), $coordinator->getCoordinatorDegreeId());
            
                    foreach ($degreeCoursesByDegree as $degreeCourse) { ?>
                        <option value="<?php echo $degreeCourse->getDegreeCourseId()?>"><?php echo $degreeCourse->getDegreeCourseName()?></option>
                    <?php }?>
                
            </select>
         </form>
        
</div>
   <!--  LA TABLA DEBE RENDERIZAR LAS ESTANCIAS DEL CURSO GRADO SELECCIONADO EN EL SELECT DE ARRIBA, AUN HAY QUE CAMBIAR -->
<div class="container ">
        <table id="internships" class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Nom</th>
                        <?php Connection::openConnection();
                             $tasks = TaskController::getTasksByDegreeCourse(Connection::getConnection(), 1); //SE DEBE PASAR CURSO GRADO POR SELECT DE LA PÁGINA
                             foreach ($tasks as $task) {
                        
                               
                                echo "<th>" .$task->getTaskName();"</th>";
                            
                            } 
                               
                             ?> 

                    
                        </tr>
                    </thead>
                    <tbody>
    
                    <?php
                    
                       
                        Connection::openConnection(); 
                        $infos = InternshipController::getInfoInternships(Connection::getConnection());
                        foreach ($infos as $info) { ?>
                        
                            <tr>
                            <th scope='row'><a style="text-decoration:none;" href="./v_view-internship.php?niu=<?php echo $info['niu_estudiante']?>"> <?php echo $info['nombre'].' '.$info['apellido'] ?> </a></td>
                            <?php $tasksInternship = InternshipTaskController::getInternshipTasksByInternshipId(Connection::getConnection(), $info['id_estancia']);
                            foreach ($tasksInternship as $taskInternship){ ?>
                                <td><?php echo $taskInternship->getTaskDate(); ?></td>
                            <?php } ?>
                             
                            <?php echo "</tr>";
                           


                        }
              
                    ?>
            </tbody>
        </table>   

</div>

<!-- MODAL INSERTAR ESTANCIA -->
<div id="insertarEstancia">
        <div class="modal fade" id="modalEstancia" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Afegir nova estada:</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <?php
                    Connection::openConnection();
                    $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
                    ?>
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            
         
                    <div>
                        <label><b>Sel·lecciona Grau i Curs:</b></label>
                        <?php Connection::openConnection();
                        $degreeCoursesByDegree = DegreeCourseController::getDegreeCoursesByDegree(Connection::getConnection(), $coordinator->getCoordinatorDegreeId()); 
                         ?>
        
                        <select name="grauCursSelec" class="form-control" aria-label=".form-select-lg example">
                        <!--  ESTO YA ESTÁ BIEN, YA PILLAS EL ID CURSO GRADO DESDE EL POST -->
                            <?php 
                    
                            Connection::openConnection();
                            $degreeCoursesByDegree = DegreeCourseController::getDegreeCoursesByDegree(Connection::getConnection(), $coordinator->getCoordinatorDegreeId()); ?>
                            <option selected>Sel·lecciona un grau i curs</option>
                                <?php foreach ($degreeCoursesByDegree as $degreeCourse) { ?>
                                <option value="<?php echo $degreeCourse->getDegreeCourseId()?>"><?php echo $degreeCourse->getDegreeCourseName()?></option>
                                <?php }?>
            
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label"><b>Niu Estudiant:</b></label>
                        <input type="text" class="form-control" name="nomDepartament" placeholder="ex: 1234567" pattern="[0-9]{7}" title="El niu ha de tenir 7 digits">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label"><b>Profesor:</b></label>
                         <!--  SELECT CON TODOS LOS PROFESORES YA COGES SU NIU LO GUARDAS EN EL VALUE -->
                        <select name="profesorSelec" class="form-control" aria-label=".form-select-lg example">
                            <?php Connection::openConnection();
                                $teachers = TeacherController::getTeachers(Connection::getConnection()) ?>
                                    <option selected>Sel·lecciona un professor</option>
                                    <?php foreach ($teachers as $teacher) { ?>
                                    <option value="<?php echo $teacher->getTeacherNiu()?>"><?php echo $teacher->getTeacherName().' '. $teacher->getTeacherSurname()?></option>
                                <?php }?>
                        </select>
                        <!-- REALMENTE INSERTARÁS EL NIU EN LA BD -->
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label"><b>Data d'inici:</b></label>
                        <input type="date" class="form-control" id="fecha-inicio"  name="fechaInicio">
                    </div>
                    <div class="form-group">
                    <label for="message-text" class="col-form-label"><b>Data de finalització:</b></label>
                    <input class="form-control" type="date" id="fecha-final"  name="fechaFinal"></input>
                    </div>
                    <!--  <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="form-label"><b>Empresa:</b></label>
                            <input type="text" class="form-control" name="identificador" placeholder="ex: MAJESTY SL" ></input>
                            <!-- HAY DUDAS, PERO SE DEBERIAN MOSTRAR LAS EMPRESAS YA REGISTRADAS Y INSERTAR SU ID
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="form-label"><b>Tutor Empresa</b></label>
                            <input type="text" class="form-control" name="identificador" placeholder="ex: Carles Vives" ></input>
                            <!-- HAY DUDAS, PERO SE DEBERIAN MOSTRAR LOS NOMBRES DE LOS TUTOTES YA REGISTRADAS Y INSERTAR SU ID
                                </div> -->
                    <br>
                    <br>
                   
                    <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Tanca</button>
                                <button type="submit" id="enviarEstancia" class="btn btn-success" name="EnviarEstancia">Afegeix</button>
                            
                    </div>
                    </form>
                            
                        
                           
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--     LOGICA DEL MODAL DE INSERTAR ESTANCIA -->
        <?php 

            if(isset($_POST['EnviarEstancia'])){
              /*   ESTAS POR AQUI */
            }
        ?>

        


</body>

        <script>

        $(document).ready(function() {
            $('#internships').DataTable();
        } );
        </script>
</html>