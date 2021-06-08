<?php 
include_once '../includes/libraries.inc.php';
$title = 'TEACHERS';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/CourseController.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';

?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      
<div class="container-fluid" style="width:80%;">
<br>
      <h1>Professors</h1>
      <br>
      <br>

      
        <ul class="nav nav-tabs ">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: #28a745;" aria-current="page" href="<?php echo TEACHERS?>"><h6>Professorat</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COORDINATORS?>"><h6>Coordinadors</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo DEPARTMENTS?>"><h6>Departaments</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo DEGREES?>"><h6>Nou Grau</h6></a>
                    </li>
                
        </ul>

        <br>
        <br>
        <div class="row">
        <div class="card text-center col-sm">
            <div class="card-body">
               
                <p class="card-text"><b>Afegeix un nou professor</b></p>
                <a href="<?php echo ADDTEACHER?>" class="btn btn-success">Afegeix</a>
            </div>
  
        </div>
        <div class="card text-center col-sm">
            <div class="card-body">
              
                <p class="card-text"><b>Modifica un professor existent</b></p>
                <a href="<?php echo MODIFYTEACHER?>" class="btn btn-success">Modifica</a>
            </div>
  
        </div>
        <div class="card text-center col-sm">
            <div class="card-body">
               
                <p class="card-text"><b>Assigna un professor a un curs i grau</b></p>
                <a href="<?php echo ASSIGNTEACHER?>" class="btn btn-success">Assigna</a>
            </div>
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
                 <button type="submit" class="btn btn-success" name="cercaProfessors" onClick="searchTeachers()">Cerca Professors</button>
            </div>
            <br>
       
       
         <br>
         <br>
          <div id="teachers"></div>
           <?php  
          /*  if(isset($_POST['cercaProfessors'])){
                        if($_POST['cursoGradoProfesores'] !== 'null'){?>
                            <table id="teachers" class="table  table-bordered  dt-responsive" style="width:100%">
                                    <thead>
                                    <tr>
                                     <th scope="col">Nom</th>
                                     <th scope="col">Departament</th>
                                     <th scope='col'>Curs/Grau</th>
                                     <th scope="col">Alumnes Assignats</th>
                                     <th scope="col">Màxim Alumnes</th>
          
                                     </tr>
                                     </thead>
                                <tbody>
                     <?php
                                    Connection::openConnection(); 
                                    $teachers = TeacherController::getTeachersInfo(Connection::getConnection(), $_POST['cursoGradoProfesores']); 
                                        if($teachers !=null){
                                        foreach ($teachers as $teacher) {
                                            $estudiantes_asignados = TeacherController::getNumStudents(Connection::getConnection(), $teacher['niu_profesor'], $_POST['cursoGradoProfesores']);
                                            $estudiantes_asignados = $estudiantes_asignados['estudiantes_asignados'];
                                            TeacherController::updateNumStudents(Connection::getConnection(), $teacher['niu_profesor'], $_POST['cursoGradoProfesores'],  $estudiantes_asignados);
                                        echo "<tr>";
                                        echo "<th scope='row'>".$teacher['nombre']. " " .$teacher['apellido']. "</td>";
                                        echo "<td>".$teacher['siglas']."</td>";
                                        echo "<td>".$teacher['curso_grado']."</td>";
                                        echo "<td>".$estudiantes_asignados."</td>";
                                        echo "<td>".$teacher['max_estudiantes']."</td>";
                                        
                                        echo "</tr>";
                                        }
                                    }
                    ?>
                                </tbody>
                            </table>   
                        
                        <?php }else{ 
                            echo "<b>No hi ha professors a mostrar</b><br><br><br><br>";
                         }
           } */?>
        
    <script>



</script>
<script src="../js/searchTeachers.js"></script>
    

    </div>
        

      
