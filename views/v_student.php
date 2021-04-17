<?php 
include_once '../includes/libraries.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/InternshipController.inc.php';
include_once '../models/InternshipModel.inc.php';
include_once '../controllers/CommentController.inc.php';
include_once '../app/Connection.inc.php';
$title = 'STUDENT';
include_once '../includes/doc-declaration.inc.php';
include_once '../includes/navbar.inc.php';

        
      
       
       
        
        Connection::openConnection(); 
        $internship = InternshipController::getStudentInternship(Connection::getConnection(), $_SESSION["niu"]);
        $extTeacher = InternshipController::getTeacherExternal(Connection::getConnection(),  $internship->getIdExternalTeacher());
        $teacher = InternshipController::getInternshipTeacher(Connection::getConnection(),  $internship->getNiuTeacher());
        $company = InternshipController::getInternshipCompany(Connection::getConnection(),  $internship->getIdCompany());
        $percentage = InternshipController::calculatePercentage(Connection::getConnection(), $_SESSION["niu"]);
       
       ?>
      
        <div class="container">
        <?php echo "<h4>Benvingut " . $_SESSION["nombre"]. " " . $_SESSION["niu"]; "</h4>"?>
       <br>
       <br>
        <h1>VISTA DEL ESTUDIANT</h1>
        <br>
        <h5>INFORMACIÓ DE LA TEVA ESTANCIA</h5>
        <br>
        <br>
        </div>
        <!-- Datos del estudiante -->
        <div class="container">
                <div class="row">
                        <br>
                        <br>
                        <div class="col-md-4"><h4><b>Tutor acadèmic</b></h4></div>
                        <div class="col-md-4"><h4><b>Tutor extern</b></h4></div>
                        <div class="col-md-4"><h4><b>Dates de l'estada</b></h4></div>
                </div>
                <div class="row">
                        <div class="col-md-4"><?php echo "<h5>".$teacher->getTeacherName(). " ". $teacher->getTeacherSurname()."</h5>" ?></div>
                        <div class="col-md-4"><?php echo "<h5>".$extTeacher->getName(). " ". $extTeacher->getSurname()."</h5>"?></div>
                        <div class="col-md-4"><h4></h4></div>
                </div>
                
                <div class="row">
                        <div class="col-md-4"><?php echo "<b>Correu electrònic: </b> ".$teacher->getTeacherEmail(); ?></div>
                        <div class="col-md-4"><?php echo "<b>Correu electrònic: </b> ".$extTeacher->getEmail(); ?></div>
                        <div class="col-md-4"><?php echo "<b>Data d'inici: </b> ". $internship->getStartDate(); ?></div>
                </div>
                <div class="row">
                        <div class="col-md-4"><?php echo "<b>Telèfon: </b> ".$teacher->getTeacherTelf(); ?></div>
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
    <div class="progress-container">
        <h5>El teu progrés</h5>
                <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentage ?>%"  aria-valuenow="<?php echo $percentage ?>"  aria-valuemin="0" aria-valuemax="100"><?php echo $percentage ?>%</div>
                        </div>
                </div>
    </div>
    <br>
    <br>
    <div class="comentaries-tutor container">
            <h5>Comentaris del tutor/a:</h5> 
            <?php  Connection::openConnection(); 
               $comments = CommentController:: getPublicComments(Connection::getConnection(), $internship->getIdInternship());  
               if($comments !== null) {?>
            <table id="comentaris-alumne" class="table table-striped table-bordered">
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
<script>
$(document).ready(function() {
            $('#comentaris-tutor').DataTable();
        } );
</script>
        </div>
        
      

