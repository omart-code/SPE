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

   
    
  

         <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <select id="cursosEstancias" class="selectpicker form-control" name="cursogradoEstancias" required="true">
            
                        <option value="null" selected>Sel·lecciona un curs i grau</option>
                  
                  <?php 
                  Connection::openConnection();
                  $degreeCourses = DegreeCourseController::getDepartmentByDegree(Connection::getConnection(), $_SESSION['niu']);
                   foreach ($degreeCourses as $degreeCourse) { ?>
                        <option value="<?php echo $degreeCourse['id_curso_grado']?>"><?php echo $degreeCourse['nombre']?></option>
                    <?php }?>
                
            </select>
            <br>
            <div class="text-right">
                 <button type="submit" class="btn btn-success" name="cercaEstades">Cerca Estades</button>
            </div>
            <br>
       
         </form>
        
</div>
 <!--  YA SE COGE EL CURSO GRADO DEL SELECT DE ARRIBA, SE PUEDE PULIR -->
 <?php  if(isset($_POST['cercaEstades'])){
       if($_POST['cursogradoEstancias'] != 'null'){?>
            <div class="container">
           
                <table id="internships"  class="table table-bordered dt-responsive display compact" width="100%">
                    <thead>
                        <tr>
                        <th>Nom</th>
                        <?php Connection::openConnection();
                             $tasks = TaskController::getTasksByDegreeCourse(Connection::getConnection(), $_POST['cursogradoEstancias']);
                             if(!empty($tasks)){
                                foreach ($tasks as $task) {
                        
                               
                                    echo "<th>" .$task->getTaskName();"</th>";
                                 }
                             } else {
                                echo "<b>No s'han definit tasques encara per aquest curs</b><br>";
                            } 
                               
                             ?> 

                        <th>Estat</th>
                        </tr>
                      
                      
                    </thead>
                    <tbody>
    
                    <?php
                    
                       
                        Connection::openConnection(); 
                        $infos = InternshipController::getInfoInternships(Connection::getConnection(), $_POST['cursogradoEstancias']);
                        $currentDate = date('Y-m-d');
                        $currentDatetime = DateTime::createFromFormat('Y-m-d', $currentDate);
                        $margen = 5;
                        
                        
                      
                        if(!empty($infos)){
                            foreach ($infos as $info) { ?>
                                
                                <tr>
                                <th><a style="text-decoration:none;" href="./v_view-internship.php?niu=<?php echo $info['niu_estudiante']?>"> <?php echo $info['nombre'].' '.$info['apellido'] ?> </a></td>
                                <?php $tasksInternship = InternshipTaskController::getInternshipTasksByInternshipId(Connection::getConnection(), $info['id_estancia']);
                                foreach ($tasksInternship as $taskInternship){ ?>
                                    <td  style="<?php if($taskInternship->getFinished() == "1"){
                                                        echo 'background-color: #c2e5ca;'; //si tasca finalitzada verd
                                                        } 
                                                        else{  //si no
                                                            if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate ){ //si encara no ha arribat la data actual a la data prevista 
                                                                if($taskInternship->getNormalTaskDate()->sub(new DateInterval('P'.$margen.'D'))->format('Y-m-d') <= $currentDate ){
                                                                    echo 'background-color: #f4cc8b'; //si falten 5 dies o menys de la data i no s'ha realitzat taronja
                                                                   
                                                                }
                                                                else{
                                                                    echo 'background-color: white;'; //blanc 
                                                                }
                                                                
                                                            }else if($taskInternship->getNormalTaskDate()->format('Y-m-d') < $currentDate ){// si la data actual es pasa de la data prevista
                                                                if($taskInternship->getNormalTaskDate()->add(new DateInterval('P'.$margen.'D'))->format('Y-m-d') >= $currentDate){ 
                                                                    echo 'background-color: #f4cc8b'; //si pasen 5 dies o menys de la data i no s'ha realitzat taronja
                                                                   
                                                                }else{
                                                                    echo 'background-color: #f2c4c9;';  //vermell
                                                                }
                                                               
                                                               
                                                            } 
                                                        }
                                                            
                                                        
                                                       
                                                       ?>" ><?php echo $taskInternship->getTaskDate(); ?></td>
                                <?php } ?>
                                <td><?php if($info['finalizada'] == 0){
                                    echo "En curs";
                                }else{
                                    echo "Finalitzada";
                                } ?></td>
                                <?php echo "</tr>";
                            


                            }
                        }else{
                            echo "<b>No hi ha informació disponible encara de les estancies</b><br><br><br><br>";
                        }
              
                    ?>
                    </tbody>
                </table>   

             <br>
             <br>           
            </div>
      <?php } else{ ?>
                <div class="container"><b>No hi ha estancies a mostrar per aquest curs i grau</b></div>
               <br>
            <?php }
        }?>
    



































    
 </div>

        


</body>

        <script>

        $(document).ready(function() {
            $('#internships').DataTable({
                responsive: true,
                "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json"
             }
            });
           
        } );
        </script>
</html>

