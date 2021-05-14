<?php 
include_once '../includes/libraries.inc.php';
$title = 'DEPARTMENTS';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/CourseController.inc.php';
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

       <!--  <?php
       /* Connection::openConnection(); 
        $courses = CourseController::getCourses(Connection::getConnection());  ?>
        <div>
        <h5>Sel·lecciona Curs</h5>
        <select name="selectCourseDepartment" class="form-control" aria-label=".form-select-lg example">
        <option selected>Sel·lecciona un curs</option>
        <?php foreach ($courses as $key => $course) { ?>
            <option value="<?php echo $key?>"><?php echo $course->getCourseName() ?></option>
        <?php } */ ?>
           
        </select>
        </div> -->


        <?php Connection::openConnection(); 
        $degrees = DegreeController::getDegrees(Connection::getConnection()); ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div> 
        <h5>Sel·lecciona Grau</h5>
        <br>
        <select name="selectDegreeDepartment" class="form-control" aria-label=".form-select-lg example">
        <option selected>Sel·lecciona un grau</option>
        <?php foreach ($degrees as $key => $degree) { ?>
            <option value="<?php echo $degree->getDegreeId()?>"><?php echo $degree->getDegreeName() ?></option>
        <?php }
         ?>
           
        </select>
        <br>
        <button type="submit" class="btn btn-success" name="cercaDep">Cerca Departaments</button>
        </form>
        </div>

        <!--   FALTA QUE CUANDO ESCOJAS CURSO Y GRADO, EL PROFESOR SEA DE ESE CURSO Y GRADO -->
        <!-- FALTA MOSTRAR DEPARTAMENTOS EN FUNCION DEL GRADO Y CURSO TOTAL ESTUDIANTES, MAXIMO ESTUDIANTES  -->

            <?php  if(isset($_POST['cercaDep']))
            {
                if($_POST['selectDegreeDepartment'] !== 'Sel·lecciona un grau')
                { ?>
                    <br>
                    <br>
                    <table id="departments" class="table  table-bordered dt-responsive" style="width:100%">
                    <thead>
                        <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Sigles</th>
                    
                        </tr>
                    </thead>
                    <tbody>
    
                    <?php
                    
                        /* HAS CONSEGUIDO CARGAR LOS DEPARTAMENTOS EN FUNCION DEL GRADO, PERO CON PHP, RETO JAVASCRIPT*/
                        Connection::openConnection(); 
                        $departments = DepartmentController:: getDepartmentByDegree(Connection::getConnection(), $_POST['selectDegreeDepartment']); 
                        foreach ($departments as $department) {
                        
                            echo "<tr>";
                            echo "<th scope='row'>".$department['nombre']."</td>";
                            echo "<td>".$department['siglas']."</td>";
                            
                            echo "</tr>";
                        }
                }else
                {
                    echo "No hi ha departaments a mostrar";
                }
            }
                   
                        
                    ?>
        </tbody>
    </table>   


    </div>

        <script>

        $(document).ready(function() {
            $('#departments').DataTable({
                "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json"
             }
            });
           
        } );
        </script>
        
      
       