<?php 
include_once '../includes/libraries.inc.php';
$title = 'TEACHER';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/InternshipController.inc.php';
?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      <?php   
       Connection::openConnection(); 
       $internships = InternshipController::getTeacherInternships(Connection::getConnection(), $_SESSION["niu"]); 
        ?>
        <div style="max-width:'600px;  margin-left: 10%; margin-right:10%;'"></div>
        <div class="container-fluid">
        <br>

                <?php echo "<h5>Benvingut " . $_SESSION["nombre"]. "</h5>"?>
                <br>
                <h3>Disposes de estades <?php echo count($internships) ?> pendents de revisar</h3>
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
                                    <h6 class="card-title">Data de finalització <?php echo $internship->getEndDate() ?></h6>
                                    <a href="./v_view-internship.php?niu=<?php  echo  $internship->getNiuStudent(); ?>" name="revisa" class="btn btn-success" student-niu="<?php echo  $internship->getNiuStudent(); ?>">Revisa</a>
                                </div>
                            </div>
                        </div>  
                            
                        <?php }?>
                        
                </div>
           
        </div>



        
      


