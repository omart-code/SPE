<?php 
include_once '../includes/libraries.inc.php';
$title = 'TEACHER';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/InternshipController.inc.php';
include_once '../controllers/InternshipTaskController.inc.php';
?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      <?php   
       Connection::openConnection(); 
       $internships = InternshipController::getTeacherInternships(Connection::getConnection(), $_SESSION["niu"]); 
        ?>
       
        <div class="container-fluid" style="width:80%;">
        <br>

                <?php echo "<h5>Benvingut " . $_SESSION["nombre"]. "</h5>"?>
                <br>
                <h3>Disposes de <?php echo count($internships) ?> estades pendents de revisar</h3>
                <br>
                <br>
                <div class="row">
                    <?php
                    //AQUI MUESTRAS TODAS LAS ESTANCIAS DE UN PROFESOR, FALTA CONTROLAR LAS QUE TENGAN TAREAS PENDIENTES.
                  
                        foreach ($internships as $internship) { 
                        $student = InternshipController::getInternshipStudent(Connection::getConnection(),  $internship->getNiuStudent());
                        ?>
                        <br>
                       
                        <div class="col-md-4 mb-3">
                            <div class="card" >
                                <div class="card-header">
                                <?php echo "<h5>".$student->getStudentName(). " ". $student->getStudentSurname()."</h5>" ?>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">Data d'inici: <?php echo $internship->getStartDate() ?></h6>
                                    <h6 class="card-title">Data de finalització: <?php echo $internship->getEndDate() ?></h6>
                                    <div class="row">
                                   
                                        <a  name="tasques" class="btn btn-success buttonTasques ml-2" style="color:white;">Mostra detalls</a>
                                   
                                   
                                        <a href="./v_view-internship.php?niu=<?php  echo  $internship->getNiuStudent(); ?>"  name="revisa" class="btn btn-success ml-2" student-niu="<?php echo  $internship->getNiuStudent(); ?>">Revisa</a>
                                  
                                       
                                    </div>
                                   
                                    <div class="tasques" style="display: none;">
                                        <br>
                                        <h6>Tasques pendents:</h6>
                                        <ul class="list-group">
                                            <?php $internshipTasks = InternshipTaskController::getMissingInternshipTasksByInternshipId(Connection::getConnection(), $internship->getIdInternship());
                                                foreach ($internshipTasks as $key => $internshipTask) {
                                                echo "<li class='list-group-item list-group-item-danger'>" .$internshipTask->getTaskName(). "</li>";
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>  
                            
                        <?php }?>
                        
                </div>
           
        </div>



        
      


