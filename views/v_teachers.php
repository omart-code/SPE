<?php 
include_once '../includes/libraries.inc.php';
$title = 'TEACHERS';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/CourseController.inc.php';
include_once '../controllers/TeacherController.inc.php';

?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      
    <div class="container h-100">
      <h1>VISTA DELS PROFESSORS</h1>
      <br>
      <br>

      
        <ul class="nav nav-tabs ">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: #28a745;" aria-current="page" href="<?php echo TEACHERS?>"><h6>Professorat</h6></a>
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
        
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Professorat</h5>
                <p class="card-text">Afegeix un nou professor a aquest curs</p>
                <a href="<?php echo ADDTEACHER?>" class="btn btn-success">Afegeix</a>
            </div>
  
        </div>

        <br>
        <br>

        <?php Connection::openConnection(); 
        $courses = CourseController::getCoursesName(Connection::getConnection());  ?>
        <div> 
        <h5>Sel·lecciona Curs</h5>
        <select class="form-control" aria-label=".form-select-lg example">
        <option selected>Sel·lecciona un curs</option>
        <?php foreach ($courses as $key => $course) { ?>
            <option value="<?php echo $key?>"><?php echo $course['nombre'] ?></option>
        <?php } ?>
           
        </select>
        </div>

        <br>
        <br>
        <?php Connection::openConnection(); 
        $degrees = DegreeController::getDegrees(Connection::getConnection());  ?>
        <div> 
        <h5>Sel·lecciona Grau</h5>
        <select class="form-control" aria-label=".form-select-lg example">
        <option selected>Sel·lecciona un grau</option>
        <?php foreach ($degrees as $key => $degree) { ?>
            <option value="<?php echo $key?>"><?php echo $degree->getDegreeName() ?></option>
        <?php } ?>
           
        </select>
        </div>

          <!--   FALTA QUE CUANDO ESCOJAS CURSO Y GRADO, EL PROFESOR SEA DE ESE CURSO Y GRADO -->
           <!-- FALTA MOSTRAR PROFES EN FUNCION DEL GRADO Y CURSO CON SU DEPARTAMENTO ALUMNOS ASIGNADOS Y MÁXIMO ALUMNOS Y FILTRAR -->
        <br>
        <br>
        <table id="teachers" class="table table-striped table-bordered">
        <thead>
            <tr>
            <th scope="col">Nom</th>
            <th scope="col">Departament</th>
          
            </tr>
        </thead>
         <tbody>
                     <?php
                         Connection::openConnection(); 
                         $teachers = TeacherController::getTeachers(Connection::getConnection()); 
                        foreach ($teachers as $teacher) {
                        
                            echo "<tr>";
                            echo "<th scope='row'>".$teacher->getTeacherName(). " " .$teacher->getTeacherSurname(). "</td>";
                            echo "<td>".$teacher->getTeacherDepartment()."</td>";
                            
                            echo "</tr>";
                        }
                        
                    ?>
        </tbody>
    </table>   
    <script>

$(document).ready(function() {
    $('#teachers').DataTable({
                "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json"
             }
            });
           
        } );;

</script>
    

    </div>
        

      
