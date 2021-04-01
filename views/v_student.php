<?php 
include_once '../includes/libraries.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/InternshipController.inc.php';
include_once '../models/InternshipModel.inc.php';
include_once '../app/Connection.inc.php';
$title = 'STUDENT';
include_once '../includes/doc-declaration.inc.php'; ?>

<?php include_once '../includes/navbar.inc.php'; ?>

        
      
       <?php echo "Bienvenido " . $_SESSION["niu"]. " " . $_SESSION["id_tipo_usuario"] ?> 
       <?php
        
        
        Connection::openConnection(); 
        $internship = InternshipController::getStudentInternship(Connection::getConnection(), $_SESSION["niu"]);
       
       ?>
        <div class="main-container">
        <h1>VISTA DEL ESTUDIANT</h1>
        <h5>INFORMACIÓ DE LA TEVA ESTANCIA</h5>
        </div>
        <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">ID Estancia</th>
            <th scope="col">Niu Estudiant</th>
            <th scope="col">Niu Profesor</th>
            <th scope="col">Data Inici</th>
            <th scope="col">Data Fi</th>
            </tr>
        </thead>
         <tbody>
                     <?php
                    
                        
                            echo "<tr>";
                            echo "<th scope='row'>".$internship->getIdInternship()."</td>";
                            echo "<td>".$internship->getNiuStudent()."</td>";
                            echo "<td>".$internship->getNiuTeacher()."</td>";
                            echo "<td>".$internship->getStartDate()."</td>";
                            echo "<td>".$internship->getEndDate()."</td>";
                            echo "</tr>";
                        
                    ?>
        </tbody>
    </table>   
    </div>
        
      
<?php include_once '../includes/footer.inc.php'; ?>
