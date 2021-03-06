<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php 
    include_once '../includes/doc-declaration.inc.php';
    include '../includes/libraries.inc.php';
    include_once '../controllers/UserController.inc.php';
    include_once '../controllers/InternshipController.inc.php';
    include_once '../controllers/PhaseController.inc.php';
    include_once '../controllers/CommentController.inc.php';
    include_once '../controllers/StudentController.inc.php';
    include_once '../controllers/ExternalTeacherController.inc.php';
    include_once '../controllers/InternshipTaskController.inc.php';
    include_once '../controllers/TaskController.inc.php';
    include_once '../controllers/CompanyController.inc.php';
    include_once '../models/InternshipModel.inc.php';
    include_once '../app/Connection.inc.php'; 
    include_once '../app/Redirection.inc.php';?>
</head>
<body>
   
<?php include_once '../includes/navbar.inc.php'; ?>
  <?php 
   Connection::openConnection(); 
   $internship = InternshipController::getStudentInternship(Connection::getConnection(), $_GET["niu"]);
   $extTeacher = InternshipController::getTeacherExternal(Connection::getConnection(),  $internship->getIdExternalTeacher());
   $student = InternshipController::getInternshipStudent(Connection::getConnection(),  $internship->getNiuStudent());
   $teacher = InternshipController::getInternshipTeacher(Connection::getConnection(),  $internship->getNiuTeacher());
   $company = InternshipController::getInternshipCompany(Connection::getConnection(),  $internship->getIdCompany());
   $percentage = InternshipController::calculatePercentage(Connection::getConnection(), $_GET['niu']);
   $phases = PhaseController::getPhases(Connection::getConnection());?>
             <!-- Datos del estudiante -->
             <div class="container-fluid" style="width:80%;">
             <br>
             <h1>Estada de estudiant</h1>
           
            <br>
            <br>
           
        <div class="card-columns">
                <div class="card" style="border:none;">
                        <h4 class="card-title"><b>Alumne/a </b><a type="button" class="button" data-toggle="modal" data-target="#modalAlumno" style="color: #28a745">
                        <i class="fa fa-edit"></i>
                        </a></h4>
                        <h5 class="card-subtitle mb-2"><?php echo $student->getStudentName(). " ". $student->getStudentSurname(); ?></h5>
                
                        <div><?php if($student->getStudentEmail()){
                                    echo "<b>Correu electr??nic: </b> ".$student->getStudentEmail();
                        }else{
                                    echo "<b>Correu electr??nic: </b>Sense informar ";
                        }  ?></div>
                        <div><?php if($student->getStudentTelf()){
                            echo "<b>Tel??fon: </b> ".$student->getStudentTelf();
                            }else{
                                echo "<b>Tel??fon: </b>Sense informar ";
                            } ?></div>
                          <div><?php if($student->getStudentMentionName()){
                            echo "<b>Menci??: </b> ".$student->getStudentMentionName();
                            }else{
                                echo "<b>Menci??: </b>Sense informar ";
                            } ?></div>
                        
                </div>

                <div class="card" style="border:none;">
                <h4 class="card-title"><b>Tutor/a extern/a </b><a type="button" class="button" data-toggle="modal" data-target="#modalProfesor" style="color: #28a745">
                        <i class="fa fa-edit"></i>
                        </a></h4>
                        <h5 class="card-subtitle mb-2"><?php if($extTeacher){
                                  echo "<h5>".$extTeacher->getName(). " ". $extTeacher->getSurname()."</h5>";
                        }else{
                            echo "<h5> Sense Informar </h5>";
                        }?>
                      
                        <div><?php if($extTeacher !=null){
                                  echo "<b>Correu electr??nic: </b> " .$extTeacher->getEmail();
                        }else{
                            echo "<b>Correu electr??nic: </b>Sense informar ";
                        } ?></div>
                        <div><?php if($extTeacher !=null){
                                  echo "<b>Tel??fon: </b> ".$extTeacher->getTelf();
                        }else{
                            echo "<b>Tel??fon: </b>Sense informar ";
                        } ?> </div>
                        <div><?php if($company !=null){
                                  echo "<b>Empresa: </b> ".$company->getCompanyName();
                        }else{
                            echo "<b>Empresa: </b>Sense informar ";
                        }?></div>
                      
						
                </div>
                
                <div class="card" style="border:none;">
                      
                        <h4 class="card-title"><b>Dates de l'estada </b><a type="button" class="button" data-toggle="modal" data-target="#modalFechas" style="color: #28a745">
                        <i class="fa fa-edit"></i>
                        </a></h4>
                        <div><?php echo "<b>Data d'inici: </b> ". $internship->getStartDate(); ?></div>
                        <div><?php echo "<b>Data de finalitzaci??: </b> ".$internship->getEndDate(); ?></div>
                </div>
               

        </div>
            
           
        
        <br>
        <br>
        <div class="container-fluid" style="width:80%;">
        <h5>Progr??s de l'alumne/a:</h5>
        <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentage ?>%"  aria-valuenow="<?php if($percentage >0 && $percentage<=100){
                        echo $percentage;
                    }else{
                        echo "0";
                    }?> "  aria-valuemin="0" aria-valuemax="100"><?php 
                         if($percentage >=100){
                            echo "<b>100%</b>";
                        
                        }else{
                            echo "<b>".$percentage."% </b>";
                        } ?></div>
                        </div>
                </div>
        </div>
        <br>
        <br>
     
      <div class="container-fluid" style="width:80%;">
        
           
            <div class="alert alert-secondary" role="alert">
                <h4>Fase Inicial</h4>
                <div class="text-right">
                <button class="btn btn-success" id="faseInicial" role="button">Consulta</button>
                </div>
            </div>
            <div style="display:none;" class="faseInicial" >
            <div class="row justify-content-center">
              
            </div>
                <table class="table table-bordered text-center table-sm" >
                        <thead>
                        <tr  style="background-color: #f3f3f3;">
                        <th scope="col">Nom tasca</th>
                        <th >Data prevista</th>
                        <th >Data activitat 1</th>
                        <th >Data activitat 2</th>
                        <th >Data activitat 3</th>
                        </tr>
                    </thead>
                    <tbody>
                                <?php
                                $currentDate = date('Y-m-d');
                                $currentDatetime = DateTime::createFromFormat('Y-m-d', $currentDate);
                                Connection::openConnection();
                                $tasks = TaskController::getTasksByPhase(Connection::getConnection(), 1, $internship->getIdDegreeCourse());
                                $tasksInternship = InternshipTaskController::getInternshipTasksByPhase(Connection::getConnection(), $internship->getIdInternship(), 1);
                              
                               
                               foreach($tasks as $task){ ?>
                                    <tr>
                                    <td style="text-align: center; vertical-align: middle;"><b><?php echo $task->getTaskName(); ?></b></td>
                                    
                                    <?php foreach ($tasksInternship as $taskInternship) {
                                      
                                       if($task->getNumTask() == $taskInternship->getTaskId()){ ?>
                                                  <td  style="text-align: center; vertical-align: middle;<?php if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate){ //data_prevista posterior data actual
                                                                        if($taskInternship->getFinished() == "1"){
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{
                                                                            echo 'background-color: white;';    
                                                                        }
                                                                           
                                                                    }else{ //data_prevista anterior data_actual
                                                                        if($taskInternship->getFinished() == "1"){ //si tasca completada
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{ //si no completada
                                                                            echo 'background-color: #f2c4c9;'; //vermell
                                                                        }
                                                                    } ?>" >
                                                  <?php if($taskInternship->getTaskDate() != null){
                                                         echo "<b>".$taskInternship->getTaskDate()."</b>"   ;
                                                        }else{ 
                                                            echo "";
                                                        } 
                                                    ?>
                                                  </td>
                                                  <td style="text-align: center; vertical-align: middle;<?php if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate){ //data_prevista posterior data actual
                                                                        if($taskInternship->getFinished() == "1"){
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{
                                                                            echo 'background-color: white;';    
                                                                        }
                                                                           
                                                                    }else{ //data_prevista anterior data_actual
                                                                        if($taskInternship->getFinished() == "1"){ //si tasca completada
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{ //si no completada
                                                                            echo 'background-color: #f2c4c9;'; //vermell
                                                                        }
                                                                    } ?>" class="taskDone" numActions="<?php echo $task->getTaskNumActions() ?>" niu="<?php echo $internship->getNiuStudent() ?>" fecha="<?php echo $taskInternship->getStringTaskDate() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getNumTask()."-1"?>"><?php if($taskInternship->getNormalAction1Date() != ""){ 
                                                            echo $taskInternship->getAction1Date();
                                                            } else { 
                                                                echo "<input type='checkbox'>"; //va el boton
                                                            }
                                                        ?>
                                                    </td>
                                                  <td style="text-align: center; vertical-align: middle;<?php if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate){ //data_prevista posterior data actual
                                                                        if($taskInternship->getFinished() == "1"){
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{
                                                                            echo 'background-color: white;';    
                                                                        }
                                                                           
                                                                    }else{ //data_prevista anterior data_actual
                                                                        if($taskInternship->getFinished() == "1"){ //si tasca completada
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{ //si no completada
                                                                            echo 'background-color: #f2c4c9;'; //vermell
                                                                        }
                                                                    } ?>" class="taskDone" numActions="<?php echo $task->getTaskNumActions() ?>" niu="<?php echo $internship->getNiuStudent() ?>" fecha="<?php echo $taskInternship->getStringTaskDate() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getNumTask()."-2"?>"><?php if($taskInternship->getNormalAction2Date() != ""){ 
                                                            echo $taskInternship->getAction2Date();
                                                            } else { 
                                                                echo "<input type='checkbox'>"; //va el boton
                                                            }
                                                        ?>
                                                  
                                                  </td>
                                                  <td style="text-align: center; vertical-align: middle;<?php if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate){ //data_prevista posterior data actual
                                                                        if($taskInternship->getFinished() == "1"){
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{
                                                                            echo 'background-color: white;';    
                                                                        }
                                                                           
                                                                    }else{ //data_prevista anterior data_actual
                                                                        if($taskInternship->getFinished() == "1"){ //si tasca completada
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{ //si no completada
                                                                            echo 'background-color: #f2c4c9;'; //vermell
                                                                        }
                                                                    } ?>"  numActions="<?php echo $task->getTaskNumActions() ?>" niu="<?php echo $internship->getNiuStudent() ?>" fecha="<?php echo $taskInternship->getStringTaskDate() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getNumTask()."-3"?>"><?php if($taskInternship->getNormalAction3Date() != ""){ 
                                                            echo $taskInternship->getAction3Date();
                                                            } else { 
                                                                echo ""; // no va el boton
                                                            }
                                                        ?>
                                                  </td>
                                                    <td><a href="./v_view_task.php?task=<?php echo $task->getTaskId()."&niu=".$internship->getNiuStudent()."&rol=teacher" ?>" type='button' class='btn btn-info bg-success'><i class='fa fa-info-circle '></i></a></td>      
                                                 </tr>
                                           
                                       <?php 
                                     }
                                      
                                   }
                                   
                               }?>
                                
                            
                    </tbody>
                </table>
            </div>
            <br>
            <div class="alert alert-secondary" role="alert">
                <h4>Fase de Seguiment</h4>
                <div class="text-right">
                <button class="btn btn-success" id="faseSeguiment" role="button">Consulta</button>
                </div>
            </div>
            <div  style="display:none;" class="faseSeguiment table-responsive" >
                <table class="table table-bordered text-center table-sm"  >
                        <thead>
                        <tr style="background-color: #f3f3f3;">
                        <th scope="col">Nom tasca</th>
                        <th scope="col">Data prevista</th>
                        <th scope="col">Data activitat 1</th>
                        <th scope="col">Data activitat 2</th>
                        <th scope="col">Data activitat 3</th>
                        <th scope="col" hidden>Informaci??</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                Connection::openConnection();
                                $tasks = TaskController::getTasksByPhase(Connection::getConnection(), 2, $internship->getIdDegreeCourse());
                                $tasksInternship = InternshipTaskController::getInternshipTasksByPhase(Connection::getConnection(), $internship->getIdInternship(), 2);
                               
                                foreach($tasks as $task){ ?>
                                    <tr>
                                    <td style="text-align: center; vertical-align: middle;"><b><?php echo $task->getTaskName(); ?></b></td>
                                    
                                    <?php foreach ($tasksInternship as $taskInternship) {
                                      
                                       if($task->getNumTask() == $taskInternship->getTaskId()){ ?>
                                                    <td style="text-align: center; vertical-align: middle;<?php if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate){ //data_prevista posterior data actual
                                                                        if($taskInternship->getFinished() == "1"){
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{
                                                                            echo 'background-color: white;';    
                                                                        }
                                                                           
                                                                    }else{ //data_prevista anterior data_actual
                                                                        if($taskInternship->getFinished() == "1"){ //si tasca completada
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{ //si no completada
                                                                            echo 'background-color: #f2c4c9;'; //vermell
                                                                        }
                                                                    } ?>" > 
                                                  <?php if($taskInternship->getTaskDate() != null){
                                                         echo "<b>".$taskInternship->getTaskDate()."</b>"   ;
                                                        }else{
                                                            echo "";
                                                        } ?>
                                                  </td>
                                                  <td style="text-align: center; vertical-align: middle;<?php if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate){ //data_prevista posterior data actual
                                                                        if($taskInternship->getFinished() == "1"){
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{
                                                                            echo 'background-color: white;';    
                                                                        }
                                                                           
                                                                    }else{ //data_prevista anterior data_actual
                                                                        if($taskInternship->getFinished() == "1"){ //si tasca completada
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{ //si no completada
                                                                            echo 'background-color: #f2c4c9;'; //vermell
                                                                        }
                                                                    } ?>" class="taskDone" numActions="<?php echo $task->getTaskNumActions() ?>" niu="<?php echo $internship->getNiuStudent() ?>" fecha="<?php echo $taskInternship->getStringTaskDate() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getNumTask()."-1"?>"><?php if($taskInternship->getNormalAction1Date() != ""){ 
                                                            echo $taskInternship->getAction1Date();
                                                            } else { 
                                                                echo "<input type='checkbox'>"; //va el boton
                                                            }
                                                        ?>
                                                    </td>
                                                  <td style="text-align: center; vertical-align: middle;<?php if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate){ //data_prevista posterior data actual
                                                                        if($taskInternship->getFinished() == "1"){
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{
                                                                            echo 'background-color: white;';    
                                                                        }
                                                                           
                                                                    }else{ //data_prevista anterior data_actual
                                                                        if($taskInternship->getFinished() == "1"){ //si tasca completada
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{ //si no completada
                                                                            echo 'background-color: #f2c4c9;'; //vermell
                                                                        }
                                                                    } ?>" class="taskDone" numActions="<?php echo $task->getTaskNumActions() ?>" niu="<?php echo $internship->getNiuStudent() ?>" fecha="<?php echo $taskInternship->getStringTaskDate() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getNumTask()."-2"?>"><?php if($taskInternship->getNormalAction2Date() != ""){ 
                                                            echo $taskInternship->getAction2Date();
                                                            } else { 
                                                                echo "<input type='checkbox'>"; //va el boton
                                                            }
                                                        ?>
                                                  
                                                  </td>
                                                  <td style="text-align: center; vertical-align: middle;<?php if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate){ //data_prevista posterior data actual
                                                                        if($taskInternship->getFinished() == "1"){
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{
                                                                            echo 'background-color: white;';    
                                                                        }
                                                                           
                                                                    }else{ //data_prevista anterior data_actual
                                                                        if($taskInternship->getFinished() == "1"){ //si tasca completada
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{ //si no completada
                                                                            echo 'background-color: #f2c4c9;'; //vermell
                                                                        }
                                                                    } ?>" class="taskDone" numActions="<?php echo $task->getTaskNumActions() ?>" niu="<?php echo $internship->getNiuStudent() ?>" fecha="<?php echo $taskInternship->getStringTaskDate() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getNumTask()."-3"?>"><?php if($taskInternship->getNormalAction3Date() != ""){ 
                                                            echo $taskInternship->getAction3Date();
                                                            } else { 
                                                                echo "<input type='checkbox'>"; //va el boton
                                                            }
                                                        ?>
                                                  </td>
                                                    <td><a href="./v_view_task.php?task=<?php echo $task->getTaskId()."&niu=".$internship->getNiuStudent()."&rol=teacher" ?>" type='button' class='btn btn-info bg-success'><i class='fa fa-info-circle '></i></a></td>      
                                                 </tr>
                                           
                                            <?php  
                                       
                                        }
                                      
                                   }
                                   
                               }?>
                            
                            
                    </tbody>
                </table>
            </div>
           
            <br>
            <div class="alert alert-secondary" role="alert">
                <h4>Fase Final</h4>
                <div class="text-right">
                <button class="btn btn-success" id="faseFinal" role="button">Consulta</button>
                </div>
            </div>
            <div  style="display:none;" class="faseFinal table-responsive" >
                <table class="table table-bordered text-center table-sm"  >
                        <thead>
                        <tr style="background-color: #f3f3f3;">
                        <th scope="col">Nom tasca</th>
                        <th scope="col">Data prevista</th>
                        <th scope="col">Data activitat 1</th>
                        <th scope="col">Data activitat 2</th>
                        <th scope="col">Data activitat 3</th>
                        <th scope="col" hidden>Informaci??</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                Connection::openConnection();
                                $tasks = TaskController::getTasksByPhase(Connection::getConnection(), 3, $internship->getIdDegreeCourse());
                                $tasksInternship = InternshipTaskController::getInternshipTasksByPhase(Connection::getConnection(), $internship->getIdInternship(), 3);
                               
                                foreach($tasks as $task){ ?>
                                    <tr>
                                    <td style="text-align: center; vertical-align: middle;"><b><?php echo $task->getTaskName(); ?></b></td>
                                    
                                    <?php foreach ($tasksInternship as $taskInternship) {
                                      
                                       if($task->getNumTask() == $taskInternship->getTaskId()){ ?>
                                                    <td style="text-align: center; vertical-align: middle;<?php if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate){ //data_prevista posterior data actual
                                                                        if($taskInternship->getFinished() == "1"){
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{
                                                                            echo 'background-color: white;';    
                                                                        }
                                                                           
                                                                    }else{ //data_prevista anterior data_actual
                                                                        if($taskInternship->getFinished() == "1"){ //si tasca completada
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{ //si no completada
                                                                            echo 'background-color: #f2c4c9;'; //vermell
                                                                        }
                                                                    } ?>" > 
                                                  <?php if($taskInternship->getTaskDate() != null){
                                                         echo "<b>".$taskInternship->getTaskDate()."</b>"   ;
                                                        }else{
                                                            echo "";
                                                        } ?>
                                                  </td>
                                                  <td style="text-align: center; vertical-align: middle;<?php if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate){ //data_prevista posterior data actual
                                                                        if($taskInternship->getFinished() == "1"){
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{
                                                                            echo 'background-color: white;';    
                                                                        }
                                                                           
                                                                    }else{ //data_prevista anterior data_actual
                                                                        if($taskInternship->getFinished() == "1"){ //si tasca completada
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{ //si no completada
                                                                            echo 'background-color: #f2c4c9;'; //vermell
                                                                        }
                                                                    } ?>" class="taskDone" numActions="<?php echo $task->getTaskNumActions() ?>" niu="<?php echo $internship->getNiuStudent() ?>" fecha="<?php echo $taskInternship->getStringTaskDate() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getNumTask()."-1"?>"><?php if($taskInternship->getNormalAction1Date() != ""){ 
                                                            echo $taskInternship->getAction1Date();
                                                            } else { 
                                                                echo "<input type='checkbox'>"; //va el boton
                                                            }
                                                        ?>
                                                    </td>
                                                  <td style="text-align: center; vertical-align: middle;<?php if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate){ //data_prevista posterior data actual
                                                                        if($taskInternship->getFinished() == "1"){
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{
                                                                            echo 'background-color: white;';    
                                                                        }
                                                                           
                                                                    }else{ //data_prevista anterior data_actual
                                                                        if($taskInternship->getFinished() == "1"){ //si tasca completada
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{ //si no completada
                                                                            echo 'background-color: #f2c4c9;'; //vermell
                                                                        }
                                                                    } ?>" class="taskDone" numActions="<?php echo $task->getTaskNumActions() ?>" niu="<?php echo $internship->getNiuStudent() ?>" fecha="<?php echo $taskInternship->getStringTaskDate() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getNumTask()."-2"?>"><?php if($taskInternship->getNormalAction2Date() != ""){ 
                                                            echo $taskInternship->getAction2Date();
                                                            } else { 
                                                                if($taskInternship->getTaskId() == '6' || $taskInternship->getTaskId() == '7' ){
                                                                    echo "<input type='checkbox'>"; //va el boton
                                                                }
                                                            }
                                                        ?>
                                                  
                                                  </td>
                                                  <td style="text-align: center; vertical-align: middle;<?php if($taskInternship->getNormalTaskDate()->format('Y-m-d') > $currentDate){ //data_prevista posterior data actual
                                                                        if($taskInternship->getFinished() == "1"){
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{
                                                                            echo 'background-color: white;';    
                                                                        }
                                                                           
                                                                    }else{ //data_prevista anterior data_actual
                                                                        if($taskInternship->getFinished() == "1"){ //si tasca completada
                                                                            echo 'background-color: #c2e5ca;'; //verd
                                                                        }else{ //si no completada
                                                                            echo 'background-color: #f2c4c9;'; //vermell
                                                                        }
                                                                    } ?>" class="taskDone" numActions="<?php echo $task->getTaskNumActions() ?>" niu="<?php echo $internship->getNiuStudent() ?>" fecha="<?php echo $taskInternship->getStringTaskDate() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getNumTask()."-3"?>"><?php if($taskInternship->getNormalAction3Date() != ""){ 
                                                            echo $taskInternship->getAction3Date();
                                                            } else { 
                                                                if($taskInternship->getTaskId() == '6' || $taskInternship->getTaskId() == '7' ){
                                                                    echo "<input type='checkbox'>"; //va el boton
                                                                }
                                                               
                                                            }
                                                        ?>
                                                  </td>
                                                <td><a href="./v_view_task.php?task=<?php echo $task->getTaskId()."&niu=".$internship->getNiuStudent()."&rol=teacher" ?>" type='button' class='btn btn-info bg-success'><i class='fa fa-info-circle '></i></a></td>      
                                                 </tr>

                                              
                                           
                                       <?php   
                                    }

                                      
                                   }
                                   
                               }?>
                             
                    </tbody>
                </table>
            </div>
            <br>
           
           
       
        </div>
    
       
    
        <br>
        <br>
        <div class="container-fluid  text-right" style="width:80%;">
             <a href="../views/v_insertComment.php?niu=<?php  echo $internship->getNiuStudent() ?>&id=<?php  echo $internship->getIdInternship() ?>&rol=teacher" class="btn btn-success escriu-comentari" role="button">Afegir Comentari</a>
        </div>
      
        
        <div class="comentaries-tutor container-fluid" style="width:80%;">
            <h5>Comentaris del tutor/a:</h5> 
            <?php  Connection::openConnection(); 
               $comments = CommentController:: getComments(Connection::getConnection(), $internship->getIdInternship());  
               if($comments !== null) {?>
            <table id="comentaris-tutor" class="table table-bordered">
                    <thead>
                        <tr style="background-color: #f3f3f3;">
                        <th scope="col">Data</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Tipus</th>
                        <th scope="col">Comentari</th>
                    
                        </tr>
                    </thead>
                    <tbody>
    
                    <?php
                    
                        
                       
                       
                            foreach ($comments as $comment) {
                        
                                echo "<tr>";
                                echo "<th scope='row'>".$comment->getCommentDate()."</td>";
                                echo "<td>".$comment->getCommentCategory()."</td>";
                                echo "<td>".$comment->getCommentType()."</td>";
                                echo "<td>".$comment->getCommentMessage()."</td>";
                                
                                echo "</tr>";
                            }
                        
                        
               
            
                   
                        
                    ?>
        </tbody>
    </table>   
    <?php }else{ 
        echo "<h6> No hi ha comentaris a mostrar </h6>";
    } ?>
    <br>
     <br>
        </div>
        
       
       
      
 <!--   L??GICA DE ACTUALIZAR ENVIO DATOS MODAL BASE DE DATOS -->
        <?php
            
            if(isset($_POST['modificaAlumno'])){
                
                Connection::openConnection();
                $mention = $_POST['mencionAlumno'];
                $mentionId = StudentController::getMentionId(Connection::getConnection(), $mention);
                if(filter_var($_POST['emailAlumno'], FILTER_VALIDATE_EMAIL)){
                   StudentController::updateStudentByNiu(Connection::getConnection(), $internship->getNiuStudent(), htmlentities($_POST['nombreAlumno'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ,
                   htmlentities($_POST['apellidoAlumno'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ,htmlentities( $_POST['emailAlumno'], ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                   htmlentities($_POST['telefonoAlumno'], ENT_QUOTES | ENT_HTML5, 'UTF-8') , $mentionId);
                   UserController::updateStudentByNiu(Connection::getConnection(), $internship->getNiuStudent(),htmlentities($_POST['nombreAlumno'], ENT_QUOTES | ENT_HTML5, 'UTF-8'),
                   htmlentities($_POST['apellidoAlumno'], ENT_QUOTES | ENT_HTML5, 'UTF-8'), htmlentities($_POST['telefonoAlumno'], ENT_QUOTES | ENT_HTML5, 'UTF-8'),htmlentities( $_POST['emailAlumno'], ENT_QUOTES | ENT_HTML5, 'UTF-8'), 2);
                }
                    echo '<script> window.location.replace("'.VIEWINTERNSHIP."&niu=".$internship->getNiuStudent().'")</script>';
          
            }
            if(isset($_POST['modificaProfesor'])){
                Connection::openConnection();
                $empresaProfesor = htmlentities($_POST['empresaProfesor'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $nombreProfesor = htmlentities($_POST['nombreProfesor'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $apellidoProfesor = htmlentities($_POST['apellidoProfesor'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $telefonoProfesor = htmlentities($_POST['telefonoProfesor'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                $emailProfesor = htmlentities($_POST['emailProfesor'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
                if($extTeacher != null){
                    if(filter_var($_POST['emailProfesor'], FILTER_VALIDATE_EMAIL)){
                    ExternalTeacherController::updateCompanyNameById(Connection::getConnection(), $extTeacher->getIdCompany(), $empresaProfesor);
                    ExternalTeacherController::updateExternalTeacherById(Connection::getConnection(), $internship->getIdExternalTeacher(), $nombreProfesor, $apellidoProfesor,
                    $emailProfesor, $telefonoProfesor);
                    }
                    echo '<script> window.location.replace("'.VIEWINTERNSHIP."&niu=".$internship->getNiuStudent().'")</script>';
                }else{
                    if(filter_var($_POST['emailProfesor'], FILTER_VALIDATE_EMAIL)){
                    Connection::openConnection();
                    $checkEmpresa = CompanyController::checkCompany(Connection::getConnection(), $empresaProfesor);
                   
                    if($checkEmpresa == null ){
                        CompanyController::insertCompany(Connection::getConnection(), $empresaProfesor);
                    }
                    
                    $empresa = CompanyController::getCompanyByName(Connection::getConnection(), $empresaProfesor);
                    
                    //comprobamos si existe ya de antes el profesor con  el correo
                    $checkTeacher = ExternalTeacherController::checkExternalTeacher(Connection::getConnection(), $emailProfesor);
                    if($checkTeacher == null){
                    ExternalTeacherController::insertTeacher(Connection::getConnection(), $nombreProfesor, $apellidoProfesor, $telefonoProfesor,  $emailProfesor, $empresa->getCompanyId());
                    }
                    $profesor =  ExternalTeacherController::checkExternalTeacher(Connection::getConnection(), $emailProfesor);
                  
                    InternshipController::updateInternshipTeacherAndCompany(Connection::getConnection(), $internship->getNiuStudent(), $profesor->getIdTeacher(), $empresa->getCompanyId());
                }
                   '<script> window.location.replace("'.VIEWINTERNSHIP."&niu=".$internship->getNiuStudent().'")</script>';
            }
            }
            if(isset($_POST['modificaFechas'])){
                Connection::openConnection();
                   
                InternshipController::updateInternshipDates(Connection::getConnection(), $internship->getNiuStudent(), $_POST['fechaInicio'], $_POST['fechaFinal']);
                echo '<script> window.location.replace("'.VIEWINTERNSHIP."&niu=".$internship->getNiuStudent().'")</script>';
            }
       ?>
   <!--     MODAL ALUMNE --> 
   <div id="modificarAlumno">
        <div class="modal fade" id="modalAlumno" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Alumne</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="alumnoForm" method="POST"  name="alumno" role="form">
                    <div class="form-group">
                            <label for="recipient-name" class="col-form-label"><b>Nom:</b></label>
                            <input type="text" class="form-control" id="nombre-alumno" value="<?php echo $student->getStudentName() ?>" name="nombreAlumno" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Cognoms:</b></label>
                            <input class="form-control" id="apellido-alumno" name="apellidoAlumno" value="<?php echo $student->getStudentSurname() ?>" required></input>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Email:</b></label>
                            <input type="email" class="form-control" id="email-alumno" name="emailAlumno" value="<?php echo $student->getStudentEmail() ?>" required></input>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Tel??fon:</b></label>
                            <input class="form-control" id="telefono-alumno" name="telefonoAlumno" value="<?php echo $student->getStudentTelf() ?>" pattern="[0-9]{9}" title="El tel??fon ha de contenir 9 digits num??rics" required></input>
                        </div>
                        
                        <div class="form-group">
                        <label for="message-text" class="col-form-label"><b>Menci??:</b></label>
                        <select name="mencionAlumno" class="form-control" aria-label=".form-select-lg example" required>
                        <?php $mentions = StudentController::getMentionsByStudentDegree(Connection::getConnection(),$student->getStudentDegree()) ;
                        
                            foreach ($mentions as $key => $mention) { ?>
                                    <option <?php if($mention['id_mencion'] == $student->getStudentMention()){
                                        echo 'selected';
                                    } ?>> <?php echo  $mention['nombre'] ?></option>
                                
                        <?php  } ?>
                    
                        </select>
                            
                        </div>
                   
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Tanca</button>
                            <button type="submit" id="submitAlumno" class="btn btn-success" name="modificaAlumno">Modifica</button>
                        
                        </div>
                     </form>
                </div>
                </div>
            </div>
        </div>
    </div>
     <!--     MODAL PROFESOR EXTERNO -->
     <div id="modificarProfesor">
        <div class="modal fade" id="modalProfesor" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Professor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="profesorForm" method="POST"  name="profesor" role="form">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label"><b>Nom:</b></label>
                            <input type="text" class="form-control" id="nombre-profesor" name="nombreProfesor" required value="<?php if (isset($extTeacher)){echo $extTeacher->getName();} ?>">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Cognom:</b></label>
                            <input class="form-control" id="apellido-profesor" name="apellidoProfesor" required value="<?php if (isset($extTeacher)){echo $extTeacher->getSurname();} ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Email:</b></label>
                            <input class="form-control" id="email-profesor" name="emailProfesor" type="email" requied value="<?php if (isset($extTeacher)){echo $extTeacher->getEmail();} ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Tel??fon:<b></label>
                            <input class="form-control" id="telefono-profesor" name="telefonoProfesor" pattern="[0-9]{9}" title="El tel??fon ha de contenir 9 digits num??rics" required value="<?php if (isset($extTeacher)){ echo $extTeacher->getTelf();}?>"></input>
                        </div>
                        <div class="form-group">
                             <?php if (isset($extTeacher)){
                                    $idEmpresa = $extTeacher->getIdCompany(); 
                                    $nombreEmpresa = ExternalTeacherController::getExternalTeacherCompany(Connection::getConnection(), $idEmpresa); }?>
                                   
                            <label for="message-text" class="col-form-label"><b>Empresa:<b></label>
                            <input class="form-control" id="empresa-profesor" name="empresaProfesor" required value="<?php if (isset($nombreEmpresa)){echo $nombreEmpresa;} ?>"></input>
                        </div>
                       
                   
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Tanca</button>
                            <button type="submit" id="submitProfesor" class="btn btn-success" name="modificaProfesor">Modifica</button>
                        
                        </div>
                     </form>
                </div>
                </div>
            </div>
        </div>
    </div>
       <!--     MODAL FECHAS -->
    <div id="modificarFechas">
        <div class="modal fade" id="modalFechas" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><b>Modificar les dates de l'estada</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="fechasForm" method="POST"  name="fechas" role="form">
                        <div class="form-group">
                                <label for="recipient-name" class="col-form-label"><b>Data d'inici:</b></label>
                                <input type="date" class="form-control" id="fecha-inicio"  name="fechaInicio" value="<?php echo $internship->getNormalStartDate();?>" required>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label"><b>Data de finalitzaci??:</b></label>
                                <input class="form-control" type="date" id="fecha-final"  name="fechaFinal" value="<?php echo $internship->getNormalEndDate();?>" required></input>
                            </div>
                            
                    
                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Tanca</button>
                                <button type="submit" id="submitFecha" class="btn btn-success" name="modificaFechas">Modifica</button>
                            
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
   
</body>
<script type="text/javascript" src="../js/showTasks.js"></script>
<script type="text/javascript" src="../js/taskDone.js"></script>
<script>
$(document).ready(function() {
    $('#comentaris-tutor').DataTable({
                "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Catalan.json"
             }
            });
           
        } );
</script>
<script>



  
</script>
        
</html>