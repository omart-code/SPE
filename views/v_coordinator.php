<?php 
include_once '../includes/libraries.inc.php';
$title = 'COORDINATOR';
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
?>
<?php include_once '../includes/navbar.inc.php'; ?>
    
        
<div class="container-fluid" style="width:80%;">
<br>
    <h1>Estades del curs</h1>
    <div class="text-right">
        <a  role="button" class="btn btn-success" data-toggle="modal" data-target="#modalEstancia" style="color:white;">Afegir nova estada </a>
    </div>
    <br>
    <br>
    <?php
    Connection::openConnection();
    $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
    ?>

   
         <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <select id="cursosEstancias" class="selectpicker form-control" name="cursogradoEstancias" required="true">
            
                <?php 
            
                Connection::openConnection();
                $degreeCoursesByDegree = DegreeCourseController::getDegreeCoursesByDegree(Connection::getConnection(), $coordinator->getCoordinatorDegreeId());?>
                        <option value="null" selected>Sel·lecciona un curs i grau</option>
                    
                  <?php  foreach ($degreeCoursesByDegree as $degreeCourse) { ?>
                        <option value="<?php echo $degreeCourse->getDegreeCourseId()?>"><?php echo $degreeCourse->getDegreeCourseName()?></option>
                    <?php }?>
                
            </select>
            <br>
            <div class="text-right">
                 <button type="submit" class="btn btn-success" name="cercaEstades">Cerca Estades</button>
            </div>
            <br>
       
         </form>
        
</div>
   <!--  YA SE COGE EL CURSO GRADO DEL SELECT DE ARRIBA, SE PUEDE PULIR -->
   <?php  if(isset($_POST['cercaEstades'])){
       if($_POST['cursogradoEstancias'] !== 'null'){?>
             <div class="container-fluid" style="width:80%;">
                <table id="internships" class="table table-bordered dt-responsive" style="width:100%">
                    <thead>
                        <tr>
                        <th scope="col">Nom</th>
                        <?php Connection::openConnection();
                             $tasks = TaskController::getTasksByDegreeCourse(Connection::getConnection(), $_POST['cursogradoEstancias']);
                             if(!empty($tasks)){
                                foreach ($tasks as $task) {
                        
                               
                                    echo "<th>" .$task->getTaskName();"</th>";
                                 }
                             } else {
                                echo "<b>No s'han definit tasques encara per aquest curs</b><br>";
                            } 
                               
                             ?> 

                        <th class="dt-body-center">Estat</th>   
                        </tr>
                       
                    </thead>
                    <tbody>
    
                    <?php
                    
                       
                        Connection::openConnection(); 
                        $infos = InternshipController::getInfoInternships(Connection::getConnection(), $_POST['cursogradoEstancias']);
                        $currentDate = date('Y-m-d');
                        $currentDatetime = DateTime::createFromFormat('Y-m-d', $currentDate);
                        $margen = 5;

                        if(!empty($infos)){
                            foreach ($infos as $info) { ?>
                                
                             
                                <tr class="dt-body-center">
                                <th  class="dt-body-center no-wrap"><a style="text-decoration:none;" href="./v_view-internship.php?niu=<?php echo $info['niu_estudiante']?>"> <?php echo $info['nombre'].' '.$info['apellido'] ?> </a></td>
                                <?php $tasksInternship = InternshipTaskController::getInternshipTasksByInternshipId(Connection::getConnection(), $info['id_estancia']);
                                foreach ($tasksInternship as $taskInternship){ ?>
                                    <td class="dt-body-center" style="<?php if($taskInternship->getFinished() == "1"){
                                                        echo 'background-color: #c2e5ca;'; //si tasca finalitzada verd
                                                        } 
                                                        else{  //si no
                                                            if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate ){ //si encara no ha arribat la data actual a la data prevista 
                                                                if($taskInternship->getNormalTaskDate()->sub(new DateInterval('P'.$margen.'D'))->format('Y-m-d') <= $currentDate ){
                                                                    echo 'background-color: #f4cc8b'; //si falten 5 dies o menys de la data i no s'ha realitzat taronja
                                                                   
                                                                }
                                                                else{
                                                                    echo 'background-color: white;'; //blanc 
                                                                }
                                                                
                                                            }else if($taskInternship->getNormalTaskDate()->format('Y-m-d') < $currentDate ){// si la data actual es pasa de la data prevista
                                                                if($taskInternship->getNormalTaskDate()->add(new DateInterval('P'.$margen.'D'))->format('Y-m-d') >= $currentDate){ 
                                                                    echo 'background-color: #f4cc8b'; //si pasen 5 dies o menys de la data i no s'ha realitzat taronja
                                                                   
                                                                }else{
                                                                    echo 'background-color: #f2c4c9;';  //vermell
                                                                }
                                                               
                                                               
                                                            } 
                                                        }
                                                            
                                                        
                                                       
                                                       ?>" ><?php echo $taskInternship->getTaskDate(); ?></td>
                                <?php } ?>
                                <td  class="dt-body-center"><?php if($info['finalizada'] == 0){
                                    echo "En curs";
                                }else{
                                    echo "Finalitzada";
                                } ?></td>
                                <?php echo "</tr>";
                            

                            


                            }
                        }else{
                            echo "<b>No hi ha informació disponible encara de les estancies</b><br><br><br><br>";
                        }
              
                    ?>
                    </tbody>
                </table>   

            </div>
      <?php } else{ ?>
            <div class="container-fluid" style="width:80%;"><b>No hi ha estancies a mostrar per aquest curs i grau</b></div>
               <br>
            <?php }
        }?>
    

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
                        <input type="text" class="form-control" name="niuEstudiant" placeholder="ex: 1234567" pattern="[0-9]{7}" title="El niu ha de tenir 7 digits">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label"><b>Nom Estudiant:</b></label>
                        <input type="text" class="form-control" name="nomEstudiant" placeholder="ex: Joan">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="form-label"><b>Cognoms Estudiant:</b></label>
                        <input type="text" class="form-control" name="cognomEstudiant" placeholder="ex: Martínez Pérez">
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
               //Inserta en estancias la estancia
               InternshipController::insertInternship(Connection::getConnection(), $_POST['niuEstudiant'], $_POST['profesorSelec'], 
                $_POST['fechaInicio'], $_POST['fechaFinal'], $_POST['grauCursSelec']);

                //Cojo el curso i el grado a partir del curso_grado
                $degreeCourse = DegreeCourseController::getDegreeCourseById(Connection::getConnection(), $_POST['grauCursSelec']);
                $grado = $degreeCourse-> getDegreeCourseDegree();
                $curso = $degreeCourse-> getDegreeCourseCourse();
              
               //Inserta el estudiante
                StudentController::insertStudent(Connection::getConnection(), $_POST['niuEstudiant'],$_POST['nomEstudiant'], $_POST['cognomEstudiant'], $grado);
                //Inserta este estudiante en los usuarios
                UserController::insertUser(Connection::getConnection(), $_POST['niuEstudiant'], $_POST['nomEstudiant'],$_POST['cognomEstudiant'], '', '', 2);
                //Recupera la ultima estancia introducida gracias al niu estudiante
                $internship = InternshipController::getStudentInternship(Connection::getConnection(), $_POST['niuEstudiant']);
                //Creo sus 9 tareas estancia para esa estancia
                InternshipTaskController::insertInternshipTasksByInternship(Connection::getConnection(), $internship->getIdInternship());
                //Recupero sus 9 tareas acabadas de crear
                $internshipTasks= InternshipTaskController::getInternshipTasksByInternshipId(Connection::getConnection(),$internship->getIdInternship());
                //Calculo sus fechas previstas y las actualizo
                InternshipTaskController::updateTasksDates($internship->getNormalStartDate(), $internship->getNormalEndDate(), $internshipTasks);
                //genero sus 9 tareas para su estancia
                TaskController::insertTasksByDegreeCourse(Connection::getConnection(), $internship->getIdDegreeCourse());
                //inserto el profesor en profesor curso grado
                DegreeCourseTeacherController::insertDegreeCourseTeacher(Connection::getConnection(),$internship->getIdDegreeCourse(),$internship-> getNiuTeacher());
 
                //echo '<script>window.location.replace("'.COORDINATOR.'")</script>';

              /*   QUEDA HACER UN MODAL DE LOADING Y QUE COMPRUEBE SI REALMENTE SE PUEDE INSERTAR LA ESTANCIA Y MOSTRAR UN ALERT DE QUE NO SE HA PODIDO */
               
            }
        ?>

        


</body>

        <script>

        $(document).ready(function() {
            $('#internships').DataTable({
                responsive: true,
                "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json"
             }
            });
           
        } );;
        
        </script>

</html>