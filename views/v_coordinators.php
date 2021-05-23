<?php 
include_once '../includes/libraries.inc.php';
$title = 'DEPARTMENTS';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/CourseController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/TeacherController.inc.php';
?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      
<div class="container-fluid" style="width:80%;">
<br>
      <h1>Coordinadors</h1>
      <br>
      <br>

      <ul class="nav nav-tabs ">
      <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" aria-current="page" href="<?php echo TEACHERS?>"><h6>Professorat</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="color: #28a745;" href="<?php echo COORDINATORS?>"><h6>Coordinadors</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo DEPARTMENTS?>"><h6>Departaments</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                
        </ul>

        <br>
        <br>
        <div class="row">
        <div class="card text-center col">
            <div class="card-body">
                <p class="card-text"><b>Afegeix un nou coordinador de grau</b></p>
                <a href="<?php echo ADDCOORDINATOR?>" class="btn btn-success">Afegeix</a>
            </div>
  
        </div>

        </div>
    

        <br>
        <br>



        <?php
    Connection::openConnection();
    $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
    ?>


          
         

      
                            <h5>Taula de coordinadors de grau</h5>
                            <br>
                            <table id="coordinadors" class="table  table-bordered  dt-responsive" style="width:100%">
                                    <thead>
                                    <tr>
                                     <th scope="col">Nom</th>
                                     <th scope="col">Grau</th>
                                     
          
                                     </tr>
                                     </thead>
                                <tbody>
                                <?php
                                    Connection::openConnection(); 
                                    $coords = CoordinatorController::getCoordinatorsAndDegrees(Connection::getConnection());
                                    
                                        foreach ($coords as $coord) {
                                           
                                           
                                        echo "<tr>";
                                        echo "<th scope='row'>".$coord['nombre'].' '.$coord['apellido']."</td>";
                                        echo "<td>".$coord['grado']."</td>";
                                       
                                        
                                        echo "</tr>";
                                        }
                        
                                  ?>
                                </tbody>
                            </table>   
                        
                       
          

        <script>

        $(document).ready(function() {
            $('#coordinadors').DataTable({
                "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json"
             }
            });
           
        } );
        </script>
        
      
       