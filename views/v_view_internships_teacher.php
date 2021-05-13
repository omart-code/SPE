<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../includes/libraries.inc.php'; 
    include '../controllers/InternshipController.inc.php'; 
    include '../controllers/TaskController.inc.php';
    include '../controllers/InternshipTaskController.inc.php'; 
    include '../controllers/DegreeCourseController.inc.php';
    include '../controllers/DegreeCourseTeacherController.inc.php';
    ?>
</head>
<body>
    <?php include '../includes/navbar.inc.php'; ?>
    <div class="container">
    
    <br>
    <div class="container">
<br>
<h1>Estades del curs</h1>
    <br>
    <br>
    <?php
    Connection::openConnection();
    //TIENES LIO CON ESTE SELECT DEBES COGER TODOS LOS PROFESORES CURSOS GRADOS DE ESTE NIU, COGES SU ID_CURSO_GRADO
    //TAMBIEN TIENES QUE MOSTRAR EL CONTENIDO DE LA TABLA EN FUNCION DEL SELECT MIRA COORDINATOR QUE ESTÁ HECHO
    $idGradosProfesor = DegreeCourseTeacherController::getDegreeCourseTeacherByNiu(Connection::getConnection(), $_SESSION['niu']);
    
   
      
        $degreeCourses = DegreeCourseController::getDegreeCoursesById(Connection::getConnection(), $idGradosProfesor);
       
  
    
    ?>
    


   
         <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <select id="cursosEstancias" class="selectpicker form-control" name="cursogradoEstancias" required="true">
            
             
            
             
              
              
                        <option value="null" selected>Sel·lecciona un curs i grau</option>
                   <!--  //ESTAS CERCA DE ARREGLARLO EL PROBLEMA ES QUE TIENES UN ARRAY DE ARRAYS Y AL ITERAR CON EL FOREACH NO SE HACE BIEN -->
                  <?php 
                  Connection::openConnection();
                   foreach ($degreeCourses[0] as $degreeCourse) { ?>
                        <option value="<?php echo $degreeCourse->getDegreeCourseId()?>"><?php echo $degreeCourse->getDegreeCourseName()?></option>
                    <?php }?>
                
            </select>
            <br>
            <div class="text-right">
                 <button type="submit" class="btn btn-success" name="cercaEstades">Cerca Estades</button>
            </div>
            <br>
       
         </form>
        
</div>
    <div>
    <table id="internships" class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">Nom</th>
                        <?php Connection::openConnection();
                             $tasks = TaskController::getTasksByDegreeCourse(Connection::getConnection(), 1); //SE DEBE PASAR CURSO GRADO POR SELECT DE LA PÁGINA
                             foreach ($tasks as $task) {
                        
                               
                                echo "<th>" .$task->getTaskName();"</th>";
                            
                            } 
                               
                             ?> 

                    
                        </tr>
                    </thead>
                    <tbody>
    
                    <?php
                    
                       
                        Connection::openConnection(); 
                        $infos = InternshipController::getInfoInternshipsByTeacher(Connection::getConnection(), $_SESSION['niu']);
                        foreach ($infos as $info) { ?>
                        
                            <tr>
                            <th scope='row'><a style="text-decoration:none;" href="./v_view-internship.php?niu=<?php echo $info['niu_estudiante']?>"> <?php echo $info['nombre'].' '.$info['apellido'] ?> </a></td>
                            <?php $tasksInternship = InternshipTaskController::getInternshipTasksByInternshipId(Connection::getConnection(), $info['id_estancia']);
                            foreach ($tasksInternship as $taskInternship){ ?>
                                <td><?php echo $taskInternship->getTaskDate(); ?></td>
                            <?php } ?>
                             
                            <?php echo "</tr>";
                           


                        }
              
                    ?>
        </tbody>
    </table>   

    </div>
 </div>

        


</body>

        <script>

        $(document).ready(function() {
            $('#internships').DataTable({
                "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json"
             }
            });
           
        } );
        </script>
</html>

