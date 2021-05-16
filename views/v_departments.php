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
    
        
      
    <div class="container h-100">
      <h1>VISTA DELS DEPARTAMENTS</h1>
      <br>
      <br>

      <ul class="nav nav-tabs ">
                    <li class="nav-item">
                        <a class="nav-link " style="color: #28a745;" aria-current="page" href="<?php echo TEACHERS?>"><h6>Professorat</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="color: #28a745;" href="<?php echo DEPARTMENTS?>"><h6>Departaments</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                
        </ul>

        <br>
        <br>
        
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Departaments</h5>
                <p class="card-text">Afegeix un nou departament</p>
                <a href="<?php echo ADDDEPARTMENT?>" class="btn btn-success">Afegeix</a>
            </div>
  
        </div>

        <br>
        <br>



        <?php
    Connection::openConnection();
    $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
    ?>

<?php 
            
            Connection::openConnection();
            $degreeCoursesByDegree = DegreeCourseController::getDegreeCoursesByDegree(Connection::getConnection(), $coordinator->getCoordinatorDegreeId()); ?>
         <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <h5>Sel·lecciona Grau i Curs</h5>
            <br>
            <select id="cursoGradoProfesores" class="selectpicker form-control" name="cursoGradoProfesores" required="true">
            
               
                        <option value="null" selected>Sel·lecciona un curs i grau</option>
                    
                  <?php  foreach ($degreeCoursesByDegree as $degreeCourse) { ?>
                        <option value="<?php echo $degreeCourse->getDegreeCourseId()?>"><?php echo $degreeCourse->getDegreeCourseName()?></option>
                    <?php }?>
                
            </select>
            <br>
            <div class="text-right">
                 <button type="submit" class="btn btn-success" name="cercaDep">Cerca Departaments</button>
            </div>
            <br>
       
         </form>
         <br>
         <br>
          

        <!--   FALTA QUE CUANDO ESCOJAS CURSO Y GRADO, EL PROFESOR SEA DE ESE CURSO Y GRADO -->
        <!-- FALTA MOSTRAR DEPARTAMENTOS EN FUNCION DEL GRADO Y CURSO TOTAL ESTUDIANTES, MAXIMO ESTUDIANTES  -->

        <?php  
           if(isset($_POST['cercaDep'])){
                        if($_POST['cursoGradoProfesores'] !== 'null'){?>
                            <table id="departments" class="table  table-bordered  dt-responsive" style="width:100%">
                                    <thead>
                                    <tr>
                                     <th scope="col">Nom</th>
                                     <th scope="col">Sigles</th>
                                     <th scope="col">Alumnes Assignats</th>
                                     <th scope="col">Màxim Alumnes</th>
          
                                     </tr>
                                     </thead>
                                <tbody>
                     <?php
                                    Connection::openConnection(); 
                                    $depts = DepartmentController::getDepartmentsInfo(Connection::getConnection(), $_POST['cursoGradoProfesores']); 
                                    
                                        foreach ($depts as $dept) {
                                           
                                           
                                        echo "<tr>";
                                        echo "<th scope='row'>".$dept['nombre_departamento']."</td>";
                                        echo "<td>".$dept['siglas']."</td>";
                                        echo "<td>".$dept['estudiantes_asignados']."</td>";
                                        echo "<td>".$dept['max_estudiantes']."</td>";
                                        
                                        echo "</tr>";
                                    }
                        
                    ?>
                                </tbody>
                            </table>   
                        
                        <?php }else{ 
                            echo "<b>No hi ha professors a mostrar</b><br><br><br><br>";
                         }
           }?>

        <script>

        $(document).ready(function() {
            $('#departments').DataTable({
                "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json"
             }
            });
           
        } );
        </script>
        
      
       