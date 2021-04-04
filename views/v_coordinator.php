<?php 
include_once '../includes/libraries.inc.php';
$title = 'COORDINATOR';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/InternshipController.inc.php';
?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      <?php   echo "Benvingut " . $_SESSION["nombre"]. " " . $_SESSION["niu"];
       Connection::openConnection(); 
       //$internships = InternshipController::getTeacherInternships(Connection::getConnection(), $_SESSION["niu"]); ?>
        <div class="main-container">
        <h1>VISTA DEL COORDINADOR</h1>
        <h5>ESTADES PENDENTS DE REVISAR</h5>
        
         
        <!--  <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">ID Estancia</th>
            <th scope="col">Niu Estudiant</th>
            <th scope="col">Nom Estudiant</th>
            <th scope="col">Data Inici</th>
            <th scope="col">Data Fi</th>
            </tr>
        </thead>
         <tbody>
                    
        </tbody>
    </table>    -->
        </div>
        
      
<?php include_once '../includes/footer.inc.php'; ?>