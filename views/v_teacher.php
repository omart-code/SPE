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
       $internships = InternshipController::getTeacherInternships(Connection::getConnection(), $_SESSION["niu"]); ?>
        <div class="container h-100">
                <?php echo "<h4>Benvingut " . $_SESSION["nombre"]. " " . $_SESSION["niu"]; "</h4>"?>
                <h1>VISTA DEL PROFESOR</h1>
                <h5>ESTADES PENDENTS DE REVISAR</h5>
                
                    <?php
                    //AQUI MUESTRAS TODAS LAS ESTANCIAS DE UN PROFESOR, FALTA CONTROLAR LAS QUE TENGAN TAREAS PENDIENTES.
                        foreach ($internships as $internship) { 
                        $student = InternshipController::getInternshipStudent(Connection::getConnection(),  $internship->getNiuStudent());
                        ?>
                        <br>
                        <div class="card" id="<?php echo $internship->getIdInternship(); ?>">
                            <div class="card-header">
                              <?php echo "<h5>".$student->getStudentName(). " ". $student->getStudentSurname()."</h5>" ?>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Data d'inici: <?php echo $internship->getStartDate() ?></h6>
                                <h6 class="card-title">Data de finalització <?php echo $internship->getEndDate() ?></h6>
                                <a href="#" class="btn btn-success">Revisa</a>
                            </div>
                            </div>
                            <br>
                            
                        <?php }?>
               
           
        </div>


        
      


