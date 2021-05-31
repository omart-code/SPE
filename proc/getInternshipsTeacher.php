<?php include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/TaskController.inc.php';
include_once '../controllers/InternshipController.inc.php';
include_once '../controllers/InternshipTaskController.inc.php';
include_once '../app/Connection.inc.php'; 


$cursoGrado = $_POST['cursoGrado'];
$niuProfesor = $_POST['niuProfesor'];

if($cursoGrado != 'null'){?>
          
        <div class="estancias">
          <table id="estancias"  class="table display table-bordered compact responsive" >
              <thead>
                  <tr>
                  <th class="text-center">Alumne/a</th>
                  <?php Connection::openConnection();
                       $tasks = TaskController::getTasksByDegreeCourse(Connection::getConnection());
                       if(!empty($tasks)){
                          foreach ($tasks as $task) {
                  
                         
                              echo "<th class='dt-body-center'>" .$task->getTaskName();"</th>";
                           }
                       } else {
                          echo "<b>No s'han definit tasques encara per aquest curs</b><br>";
                      } 
                         
                       ?> 

                  <th class="text-center">Estat</th>
                  </tr>
                
                
              </thead>
              <tbody>

              <?php
              
                 
                  Connection::openConnection(); 
                  $infos = InternshipController::getInfoInternshipsByTeacher(Connection::getConnection(),  $niuProfesor, $cursoGrado);
                  $currentDate = date('Y-m-d');
                  $currentDatetime = DateTime::createFromFormat('Y-m-d', $currentDate);
                  $margen = 5;
                  
                  
                
                  if(!empty($infos)){
                      foreach ($infos as $info) { ?>
                          
                          <tr class="dt-body-center  nowrap">
                          <th  class="dt-body-center"><a style="text-decoration:none;" href="./v_view-internship.php?niu=<?php echo $info['niu_estudiante']?>"> <?php echo $info['apellido'].', '.$info['nombre'] ?> </a></th>

                          <?php $tasksInternship = InternshipTaskController::getInternshipTasksByInternshipId(Connection::getConnection(), $info['id_estancia']);
                          foreach ($tasksInternship as $taskInternship){ ?>
                              <td class="text-center" style="<?php if($taskInternship->getFinished() == "1"){
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
                          <td  class="dt-body-center"><?php if($info['finalizada'] == 0){
                              echo "En curs";
                          }else{
                              echo "Finalitzada";
                          } ?></td>
                          <?php echo "</tr>";
                      


                      }
                  }
        
              ?>
              </tbody>
          </table>   
           
       <br>
       <br>           
     
<?php } else{ ?>
  
         <br>
      <?php }
  ?>
</div>
<script>

$(document).ready(function() {
$('#estancias').DataTable({

    responsive: true,
    "language": {
    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json"
    }
});
} );
</script>
