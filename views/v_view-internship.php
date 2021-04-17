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
    include_once '../models/InternshipModel.inc.php';
    include_once '../app/Connection.inc.php'; ?>
</head>
<body>
   
  
  <?php 
   Connection::openConnection(); 
   $internship = InternshipController::getStudentInternship(Connection::getConnection(), $_GET["niu"]);
   $extTeacher = InternshipController::getTeacherExternal(Connection::getConnection(),  $internship->getIdExternalTeacher());
   $student = InternshipController::getInternshipStudent(Connection::getConnection(),  $internship->getNiuStudent());
   $teacher = InternshipController::getInternshipTeacher(Connection::getConnection(),  $internship->getNiuTeacher());
   $company = InternshipController::getInternshipCompany(Connection::getConnection(),  $internship->getIdCompany());
   $percentage = InternshipController::calculatePercentage(Connection::getConnection(), $_GET['niu']);
   $phases = PhaseController::getPhases(Connection::getConnection());
   ?>
             <!-- Datos del estudiante -->
             <div class="container">
             <h1>VISTA DE UNA ESTADA CONCRETA</h1>
            <br>
            <br>
             <div class="row">
                        <br>
                        <br>
                        <div class="col-md-4"><h4><b>Alumne</b></h4></div>
                        <div class="col-md-4"><h4><b>Tutor extern</b></h4></div>
                        <div class="col-md-4"><h4><b>Dates de l'estada</b></h4></div>
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
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentage ?>%"  aria-valuenow="<?php echo $percentage ?>"  aria-valuemin="0" aria-valuemax="100"><?php echo $percentage ?>%</div>
                        </div>
                </div>
        </div>

        <br>
        <br>
      <!--   AQUI TENDRÁS QUE HACER QUE CUANDO UNA FASE SE COMPLETE SE PONGA EN VERDE, Y SI NO ES ASI EN ROJO -->
      <!-- HACER UN ACORDEON QUE MUESTRE POR CADA FASE SU TABLA DE TAREAS -->
    
        <?php foreach ($phases as $phase) { ?>
           
            <div class="alert alert-secondary" role="alert">
                <?php echo "<h4>". $phase->getPhaseName() ."</h4>" ?>
                <div class="text-right">
                <button class="btn btn-success mostra-tasques"  href="<?php echo "#".$phase->getPhaseName(); ?>" role="button">Consulta</button>
                </div>
                
            </div>
 
            <br>
           
        <?php }?>

    
    
        <br>
        <br>

       

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
   
        
   
</body>

<script>
$(document).ready(function() {
            $('#comentaris-tutor').DataTable();
        } );
</script>
        
</html>
