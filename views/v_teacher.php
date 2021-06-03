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
       $currentDate = date('Y-m-d');
     
        ?>
       
        <div class="container-fluid" style="width:80%;">
        <br>

                <?php echo "<h4>Benvingut " . $_SESSION["nombre"]. "</h4>"?>
                <br>
                <?php if($internships !=null){?>
                <h3>Disposes de <?php echo count($internships) ?> estades pendents de revisar</h3>
                <?php } ?>
                <br>
                <br>
                <div class="row">
                    <?php
                    
                        if($internships){

                      
                        foreach ($internships as $internship) { 
                        $student = InternshipController::getInternshipStudent(Connection::getConnection(),  $internship['niu_estudiante']);
                        
                        ?>
                        <br>
                       
                        <div class="col-md-4 mb-3">
                            <div class="card" >
                                <div class="card-header">
                                <?php echo "<h5>".$student->getStudentName(). " ". $student->getStudentSurname()."</h5>" ?>
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title">Data d'inici: <?php echo $internship['fecha_inicio'] ?></h6>
                                    <h6 class="card-title">Data de finalització: <?php echo $internship['fecha_fin'] ?></h6>
                                    <div class="row">
                                   
                                        <a  name="tasques" class="btn btn-success buttonTasques ml-2" style="color:white;">Mostra detalls</a>
                                   
                                   
                                        <a href="./v_view-internship.php?niu=<?php  echo  $internship['niu_estudiante'] ?>"  name="revisa" class="btn btn-success ml-2" student-niu="<?php echo  $internship['niu_estudiante'] ?>">Revisa</a>
                                  
                                       
                                    </div>
                                   
                                    <div class="tasques" style="display: none;">
                                        <br>
                                        <h6>Tasques pendents:</h6>
                                        <?php $internshipTasks = InternshipTaskController::getMissingInternshipTasksByInternshipId(Connection::getConnection(), $internship['id_estancia']);
                                            
                                             $pendents = false;
                                           ?>
                                        <ul class="list-group">
                                            <?php 

                                                foreach ($internshipTasks as $key => $internshipTask) {
                                                    if($internshipTask->getNormalTaskDate()->format('Y-m-d') < $currentDate){ 
                                                        $pendents = true;
                                                        echo "<li class='list-group-item list-group-item-danger'>" .$internshipTask->getTaskName(). "</li>";
                                                    }
                                              
                                                }
                                            ?>
                                        </ul>
                                        <?php if($pendents == false){
                                            echo "No hi han tasques pendents";
                                        }?>
                                    </div>
                                </div>
                            </div>
                        </div>  
                            
                        <?php }
                        }else{ ?>
                                <h5>No tens estancies assignades</h5>
                      <?php  }?>
                        
                </div>
           
        </div>



        
      


