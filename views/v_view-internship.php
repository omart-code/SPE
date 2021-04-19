<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW INTERNSHIP</title>
    <?php 
    include '../includes/libraries.inc.php';
    include_once '../controllers/UserController.inc.php';
    include_once '../controllers/InternshipController.inc.php';
    include_once '../controllers/PhaseController.inc.php';
    include_once '../controllers/CommentController.inc.php';
    include_once '../controllers/StudentController.inc.php';
    include_once '../controllers/ExternalTeacherController.inc.php';
    include_once '../models/InternshipModel.inc.php';
    include_once '../app/Connection.inc.php'; 
    include_once '../app/Redirection.inc.php';?>
</head>
<body>
   
<?php include_once '../includes/navbar.inc.php'; ?>
  <?php 
   Connection::openConnection(); 
   $internship = InternshipController::getStudentInternship(Connection::getConnection(), $_GET["niu"]);
   $extTeacher = InternshipController::getTeacherExternal(Connection::getConnection(),  $internship->getIdExternalTeacher());
   $student = InternshipController::getInternshipStudent(Connection::getConnection(),  $internship->getNiuStudent());
   $teacher = InternshipController::getInternshipTeacher(Connection::getConnection(),  $internship->getNiuTeacher());
   $company = InternshipController::getInternshipCompany(Connection::getConnection(),  $internship->getIdCompany());
   $percentage = InternshipController::calculatePercentage(Connection::getConnection(), $_GET['niu']);
   $phases = PhaseController::getPhases(Connection::getConnection());?>
             <!-- Datos del estudiante -->
             <div class="container">
             <h1>VISTA DE UNA ESTADA CONCRETA</h1>
           
            <br>
            <br>
        
             <div class="row">
                        <br>
                        <br>
                        <div class="col-md-4"><h4><b>Alumne
                        <a type="button" class="button" data-toggle="modal" data-target="#modalAlumno" style="color: #28a745">
                        <i class="fa fa-edit"></i>
                        </a>
                        </b></h4>
                        
                        </div>
                        <div class="col-md-4"><h4><b>Tutor extern
                        <a type="button" class="button" data-toggle="modal" data-target="#modalProfesor" style="color: #28a745">
                        <i class="fa fa-edit"></i>
                        </a></b></h4></div>
                        <div class="col-md-4"><h4><b>Dates de l'estada</b>
                        <a type="button" class="button" data-toggle="modal" data-target="#modalFechas" style="color: #28a745">
                        <i class="fa fa-edit"></i>
                        </a></h4></div>
                </div>
                <div class="row">
                        <div class="col-md-4"><?php echo "<h5>".$student->getStudentName(). " ". $student->getStudentSurname()."</h5>" ?></div>
                        <div class="col-md-4"><?php echo "<h5>".$extTeacher->getName(). " ". $extTeacher->getSurname()."</h5>"?></div>
                        <div class="col-md-4"></div>
                </div>
                
                <div class="row">
                        <div class="col-md-4"><?php echo "<b>Correu electrònic: </b> ".$student->getStudentEmail(); ?></div>
                        <div class="col-md-4"><?php echo "<b>Correu electrònic: </b> ".$extTeacher->getEmail(); ?></div>
                        <div class="col-md-4"><?php echo "<b>Data d'inici: </b> ". $internship->getStartDate(); ?></div>
                </div>
                <div class="row">
                        <div class="col-md-4"><?php echo "<b>Telèfon: </b> ".$student->getStudentTelf(); ?></div>
                        <div class="col-md-4"><?php echo "<b>Telèfon: </b> ".$extTeacher->getTelf(); ?> </div>
                        <div class="col-md-4"><?php echo "<b>Data de finalització: </b> ".$internship->getEndDate(); ?></div>
                </div>
                <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><?php echo "<b>Empresa: </b> ".$company->getCompanyName(); ?></div>
                        <div class="col-md-4"></div>
                </div>

        </div>
        <br>
        <br>

        <div class="progress-container container">
        <h5>El teu progrés</h5>
                <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentage ?>%"  aria-valuenow="<?php echo $percentage ?>"  aria-valuemin="0" aria-valuemax="100"><?php 
                         if($percentage >100){
                            echo 100;
                        }else{
                            echo $percentage;
                        } ?>%</div>
                        </div>
                </div>
        </div>

        <br>
        <br>
      <!--   AQUI TENDRÁS QUE HACER QUE CUANDO UNA FASE SE COMPLETE SE PONGA EN VERDE, Y SI NO ES ASI EN ROJO -->
      <!-- HACER UN ACORDEON QUE MUESTRE POR CADA FASE SU TABLA DE TAREAS DE MOMENTO NO VA -->
        <div class="container">
        <?php foreach ($phases as $phase) { ?>
           
            <div class="alert alert-secondary" role="alert">
                <?php echo "<h4>". $phase->getPhaseName() ."</h4>" ?>
                <div class="text-right">
                <button class="btn btn-success mostra-tasques"  href="<?php echo "#".$phase->getPhaseName(); ?>" role="button">Consulta</button>
                </div>
                
            </div>
 
            <br>
           
        <?php }?>
        </div>
    
    
        <br>
        <br>

        <div class="container text-right">
             <button class="btn btn-success escriu-comentari" data-toggle="modal" data-target="#modalComentario" role="button">Afegir Comentari</button>
        </div>
      
        
        <div class="comentaries-tutor container">
            <h5>Comentaris del tutor/a:</h5> 
            <?php  Connection::openConnection(); 
               $comments = CommentController:: getComments(Connection::getConnection(), $internship->getIdInternship());  
               if($comments !== null) {?>
            <table id="comentaris-tutor" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Data</th>
                        <th scope="col">Comentari</th>
                    
                        </tr>
                    </thead>
                    <tbody>
    
                    <?php
                    
                        
                       
                       
                            foreach ($comments as $comment) {
                        
                                echo "<tr>";
                                echo "<th scope='row'>".$comment->getCommentDate()."</td>";
                                echo "<td>".$comment->getCommentMessage()."</td>";
                                
                                echo "</tr>";
                            }
                        
                        
               
            
                   
                        
                    ?>
        </tbody>
    </table>   
    <?php }else{ 
        echo "<h6> No hi ha comentaris a mostrar </h6>";
    } ?>
        </div>
        
       


       
      
 <!--   LÓGICA DE ACTUALIZAR ENVIO DATOS MODAL BASE DE DATOS -->

        <?php
            
            if(isset($_POST['modificaAlumno'])){
                
                    Connection::openConnection();
                   
                    StudentController::updateStudentByNiu(Connection::getConnection(), $internship->getNiuStudent(), $_POST['nombreAlumno'], $_POST['apellidoAlumno'], $_POST['emailAlumno'], $_POST['telefonoAlumno']);
                    //SE DEBERIA TAMBIEN ACTUALIZAR EL USUARIO CORRESPONDIENTE A ESE STUDENT??!!
            }

            if(isset($_POST['modificaProfesor'])){
                Connection::openConnection();
                   
                ExternalTeacherController::updateExternalTeacherById(Connection::getConnection(), $internship->getIdExternalTeacher(), $_POST['nombreProfesor'], $_POST['apellidoProfesor'],
                $_POST['emailProfesor'], $_POST['telefonoProfesor']);
            }

            if(isset($_POST['modificaFechas'])){
                Connection::openConnection();
                   
                InternshipController::updateInternshipDates(Connection::getConnection(), $internship->getNiuStudent(), $_POST['fechaInicio'], $_POST['fechaFinal']);
            }

            //LA INSERCION  DEL COMENTARIO LA HACE PERO SI RECARGAS LA PAGINA SE VUELVE A INSERTAR,

            if (!empty($_POST)) {
                if (!empty($_POST['textoComentario'])) {
                    Connection::openConnection();
                    CommentController::insertComment(Connection::getConnection(),$_POST['textoComentario'], $_POST['tipoComentario'], $internship->getIdInternship(), 'especial');
                   
                }
            }
            
            /* if(isset($_POST['insertaComentario'])){
                Connection::openConnection();
                   
                CommentController::insertComment(Connection::getConnection(),$_POST['textoComentario'], $_POST['tipoComentario'], $internship->getIdInternship(), 'especial');
               
            } */
       ?>

   <!--     MODAL ALUMNE --> 
   <div id="modificarAlumno">
        <div class="modal fade" id="modalAlumno" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Alumne</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="alumnoForm" method="POST"  name="alumno" role="form">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nom:</label>
                            <input type="text" class="form-control" id="nombre-alumno" name="nombreAlumno">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Cognom:</label>
                            <input class="form-control" id="apellido-alumno" name="apellidoAlumno"></input>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Email:</label>
                            <input class="form-control" id="email-alumno" name="emailAlumno"></input>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Telèfon:</label>
                            <input class="form-control" id="telefono-alumno" name="telefonoAlumno"></input>
                        </div>
                   
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Tanca</button>
                            <button type="submit" id="submit" class="btn btn-success" name="modificaAlumno">Modifica</button>
                        
                        </div>
                     </form>
                </div>
                </div>
            </div>
        </div>
    </div>

     <!--     MODAL PROFESOR EXTERNO -->
     <div id="modificarProfesor">
        <div class="modal fade" id="modalProfesor" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Professor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="profesorForm" method="POST"  name="profesor" role="form">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nom:</label>
                            <input type="text" class="form-control" id="nombre-alumno" name="nombreProfesor">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Cognom:</label>
                            <input class="form-control" id="apellido-alumno" name="apellidoProfesor"></input>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Email:</label>
                            <input class="form-control" id="email-alumno" name="emailProfesor"></input>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Telèfon:</label>
                            <input class="form-control" id="telefono-alumno" name="telefonoProfesor"></input>
                        </div>
                       
                   
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Tanca</button>
                            <button type="submit" id="submit" class="btn btn-success" name="modificaProfesor">Modifica</button>
                        
                        </div>
                     </form>
                </div>
                </div>
            </div>
        </div>
    </div>

       <!--     MODAL FECHAS -->
       <div id="modificarFechas">
        <div class="modal fade" id="modalFechas" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar les dates de l'estada</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="fechasForm" method="POST"  name="fechas" role="form">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Data d'inici</label>
                            <input type="date" class="form-control" id="fecha-inicio" name="fechaInicio">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Data de finalització:</label>
                            <input class="form-control" type="date" id="fecha-final" name="fechaFinal"></input>
                        </div>
                        
                   
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Tanca</button>
                            <button type="submit" id="submit" class="btn btn-success" name="modificaFechas">Modifica</button>
                        
                        </div>
                     </form>
                </div>
                </div>
            </div>
        </div>
    </div>

   <!--  MODAL AÑADIR COMENTARIO -->
    <div id="insertarComentario">
        <div class="modal fade" id="modalComentario" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Afegeix un comentari</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="comentariosForm" method="POST"  name="comentarios" role="form">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tipus de comentari:</label>
                            <select name="tipoComentario" class="form-control" aria-label=".form-select-lg example">
                                <option selected>Públic</option>
                                <option>Privat</option>
                            </select>
                        </div>
                        <div class="form-group mt-5 mb-5">
                            <label for="message-text" class="col-form-label">Comentari:</label>
                            <textarea class="form-control" name="textoComentario"></textarea>
                        </div> 
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Tanca</button>
                            <button type="submit" id="submit" class="btn btn-success" name="insertaComentario">Afegeix</button>
                        
                        </div>
                     </form>
                </div>
                </div>
            </div>
        </div>
    </div>
        

   
</body>
<script>
$(document).ready(function() {
            $('#comentaris-tutor').DataTable();
} );


</script>


        
</html>
