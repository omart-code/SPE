<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>VIEW INTERNSHIP</title>
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
             <div class="container">
             <h1>VISTA DE UNA ESTADA CONCRETA</h1>
           
            <br>
            <br>
        
            <div class="row">
                        <br>
                        <br>
                        <div class="col-md-4"><h4><b>Alumne
                        <a type="button" class="button" data-toggle="modal" data-target="#modalAlumno" style="color: #28a745">
                        <i class="fa fa-edit"></i>
                        </a>
                        </b></h4>
                        
                        </div>
                        <div class="col-md-4"><h4><b>Tutor extern
                        <a type="button" class="button" data-toggle="modal" data-target="#modalProfesor" style="color: #28a745">
                        <i class="fa fa-edit"></i>
                        </a></b></h4></div>
                        <div class="col-md-4"><h4><b>Dates de l'estada</b>
                        <a type="button" class="button" data-toggle="modal" data-target="#modalFechas" style="color: #28a745">
                        <i class="fa fa-edit"></i>
                        </a></h4></div>
                </div>
                <div class="row">
                        <div class="col-md-4"><?php echo "<h5>".$student->getStudentName(). " ". $student->getStudentSurname()."</h5>" ?></div>
                        <div class="col-md-4"><?php if($extTeacher !=null){
                                  echo "<h5>".$extTeacher->getName(). " ". $extTeacher->getSurname()."</h5>";
                        }else{
                            echo "<h5> </h5>";
                        }
                          ?></div>
                        <div class="col-md-4"></div>
                </div>
                
                <div class="row">
                        <div class="col-md-4"><?php echo "<b>Correu electrònic: </b> ".$student->getStudentEmail(); ?></div>
                        <div class="col-md-4"><?php if($extTeacher !=null){
                                  echo "<b>Correu electrònic: </b> " .$extTeacher->getEmail();
                        }else{
                            echo "<b>Correu electrònic: </b>";
                        } ?></div>
                        <div class="col-md-4"><?php echo "<b>Data d'inici: </b> ". $internship->getStartDate(); ?></div>
                </div>
                <div class="row">
                        <div class="col-md-4"><?php echo "<b>Telèfon: </b> ".$student->getStudentTelf(); ?></div>
                        <div class="col-md-4"><?php if($extTeacher !=null){
                                  echo "<b>Telèfon: </b> ".$extTeacher->getTelf();
                        }else{
                            echo "<b>Telèfon: </b>";
                        } ?> </div>
                        <div class="col-md-4"><?php echo "<b>Data de finalització: </b> ".$internship->getEndDate(); ?></div>
                </div>
                <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><?php if($company !=null){
                                  echo "<b>Empresa: </b> ".$company->getCompanyName();
                        }else{
                            echo "<b>Empresa: </b>";
                        }?></div>
                        <div class="col-md-4"></div>
                </div>
        </div>
        <br>
        <br>
        <div class="progress-container container">
        <h5>Progrés del alumne:</h5>
        <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percentage ?>%"  aria-valuenow="<?php if($percentage >0 && $percentage<=100){
                        echo $percentage;
                    }else{
                        echo "0";
                    }?> "  aria-valuemin="0" aria-valuemax="100"><?php 
                         if($percentage ==100){
                            echo "<b>100%</b>";
                        }elseif($percentage > 100 || $percentage < 0){
                            echo "<b>0%</b>";
                        }else{
                            echo "<b>".$percentage."% </b>";
                        } ?></div>
                        </div>
                </div>
        </div>
        <br>
        <br>
      <!--   AQUI TENDRÁS QUE HACER QUE CUANDO UNA FASE SE COMPLETE SE PONGA EN VERDE, Y SI NO ES ASI EN ROJO -->
      <!-- HACER UN ACORDEON QUE MUESTRE POR CADA FASE SU TABLA DE TAREAS, LO HACE PERO FALTA DAR FORMATO Y CONTROLAR CREAR FILAS PESE A NO TENER VALORES-->
        <div class="container">
        
           
            <div class="alert alert-secondary" role="alert">
                <h4>Fase Inicial</h4>
                <div class="text-right">
                <button class="btn btn-success" id="faseInicial" role="button">Consulta</button>
                </div>
            </div>
            <div  style="display:none;" class="faseInicial table-responsive" >
                <table class="table  table-bordered" >
                        <thead>
                        <tr>
                        <th scope="col">Nom tasca</th>
                        <th >Data prevista</th>
                        <th >Data activitat 1</th>
                        <th >Data activitat 2</th>
                        <th >Data activitat 3</th>
                        </tr>
                    </thead>
                    <tbody>
                                <?php
                                Connection::openConnection();
                                $tasks = TaskController::getTasksByPhase(Connection::getConnection(), 1);
                              
                                $tasksInternship = InternshipTaskController::getInternshipTasksByPhase(Connection::getConnection(), $internship->getIdInternship(), 1);
                               
                               foreach($tasks as $task){ ?>
                                    <tr>
                                    <td class='text-justify'><b><?php echo $task->getTaskName(); ?></b></td>
                                    
                                    <?php foreach ($tasksInternship as $taskInternship) {
                                      
                                       if($task->getTaskId() == $taskInternship->getTaskId()){ ?>
                                                  <td> 
                                                  <?php if($taskInternship->getTaskDate() != null){
                                                         echo "<b>".$taskInternship->getTaskDate()."</b>"   ;
                                                  }else{ echo "Sense data";
                                                  } ?>
                                                  </td>
                                                  <td  style="<?php if($taskInternship->getNormalAction1Date() != ""){
                                                                        if($taskInternship->getNormalTaskDate() < $taskInternship->getNormalAction1Date()){?>
                                                                                        background-color: #f2c4c9;   
                                                                      <?php  }else{ ?>
                                                                           background-color: #c2e5ca; 
                                                                    <?php  } 
                                                                    } ?>" class="taskDone" niu="<?php echo $internship->getNiuStudent() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getTaskId()."-1"?>"> <?php if($taskInternship->getAction1Date() != null){
                                                      echo $taskInternship->getAction1Date();
                                                    }else{ ?>
                                                        <div class="check text-center" >
                                                      
                                                        </div>
                                                      
                                                    <?php } ?>
                                                    </td>
                                                  <td style="<?php if($taskInternship->getNormalAction2Date() != ""){
                                                                        if($taskInternship->getNormalTaskDate()< $taskInternship->getNormalAction2Date()){?>
                                                                                        background-color: #f2c4c9;   
                                                                      <?php  }else{ ?>
                                                                           background-color: #c2e5ca; 
                                                                    <?php  } 
                                                                    } ?>" class="taskDone" niu="<?php echo $internship->getNiuStudent() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getTaskId()."-2"?>"><?php if($taskInternship->getAction2Date() != null){
                                                      echo $taskInternship->getAction2Date();
                                                    }else{ ?>
                                                        <div class="check text-center">
                                                      
                                                        </div>
                                                      
                                                    <?php } ?></td>
                                                  <td style="<?php if($taskInternship->getNormalAction3Date() != ""){
                                                                        if($taskInternship->getNormalTaskDate()< $taskInternship->getNormalAction3Date()){?>
                                                                                        background-color: #f2c4c9;   
                                                                      <?php  }else{ ?>
                                                                           background-color: #c2e5ca; 
                                                                    <?php  } 
                                                                    } ?>" class="taskDone" niu="<?php echo $internship->getNiuStudent() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getTaskId()."-3"?>"> <?php if($taskInternship->getAction3Date() != null){
                                                      echo $taskInternship->getAction3Date();
                                                    }else{ ?>
                                                        <div class="taskDone" class="check text-center">
                                                       
                                                        </div>
                                                      
                                                    <?php } ?></td>
                                                    <td><a href="./v_view_task.php?task=<?php echo $task->getTaskId()."&niu=".$internship->getNiuStudent() ?>" type='button' class='btn btn-info bg-success'><i class='fa fa-info-circle '></i></a></td>      
                                                 </tr>
                                           
                                       <?php }
                                      
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
                <table class="table table-bordered"  >
                        <thead>
                        <tr>
                        <th scope="col">Nom tasca</th>
                        <th scope="col">Data prevista</th>
                        <th scope="col">Data activitat 1</th>
                        <th scope="col">Data activitat 2</th>
                        <th scope="col">Data activitat 3</th>
                        <th scope="col" hidden>Informació</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                Connection::openConnection();
                                $tasks = TaskController::getTasksByPhase(Connection::getConnection(), 2);
                                $tasksInternship = InternshipTaskController::getInternshipTasksByPhase(Connection::getConnection(), $internship->getIdInternship(), 2);
                               
                                foreach($tasks as $task){ ?>
                                    <tr>
                                    <td class='text-justify'><b><?php echo $task->getTaskName(); ?></b></td>
                                    
                                    <?php foreach ($tasksInternship as $taskInternship) {
                                      
                                       if($task->getTaskId() == $taskInternship->getTaskId()){ ?>
                                                  <td> 
                                                  <?php if($taskInternship->getTaskDate() != null){
                                                         echo "<b>".$taskInternship->getTaskDate()."</b>"   ;
                                                  }else{ echo "Sense data";
                                                  } ?>
                                                  </td>
                                                  <td  style="<?php if($taskInternship->getNormalAction1Date() != ""){
                                                                        if($taskInternship->getNormalTaskDate() < $taskInternship->getNormalAction1Date()){?>
                                                                                        background-color: #f2c4c9;   
                                                                      <?php  }else{ ?>
                                                                           background-color: #c2e5ca; 
                                                                    <?php  } 
                                                                    } ?>" class="taskDone" niu="<?php echo $internship->getNiuStudent() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getTaskId()."-1"?>"> <?php if($taskInternship->getAction1Date() != null){
                                                      echo $taskInternship->getAction1Date();
                                                    }else{ ?>
                                                        <div class="check text-center" >
                                                      
                                                        </div>
                                                      
                                                    <?php } ?>
                                                    </td>
                                                  <td style="<?php if($taskInternship->getNormalAction2Date() != ""){
                                                                        if($taskInternship->getNormalTaskDate()< $taskInternship->getNormalAction2Date()){?>
                                                                                        background-color: #f2c4c9;   
                                                                      <?php  }else{ ?>
                                                                           background-color: #c2e5ca; 
                                                                    <?php  } 
                                                                    } ?>" class="taskDone" niu="<?php echo $internship->getNiuStudent() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getTaskId()."-2"?>"><?php if($taskInternship->getAction2Date() != null){
                                                      echo $taskInternship->getAction2Date();
                                                    }else{ ?>
                                                        <div class="check text-center">
                                                      
                                                        </div>
                                                      
                                                    <?php } ?></td>
                                                  <td style="<?php if($taskInternship->getNormalAction3Date() != ""){
                                                                        if($taskInternship->getNormalTaskDate()< $taskInternship->getNormalAction3Date()){?>
                                                                                        background-color: #f2c4c9;   
                                                                      <?php  }else{ ?>
                                                                           background-color: #c2e5ca; 
                                                                    <?php  } 
                                                                    } ?>" class="taskDone" niu="<?php echo $internship->getNiuStudent() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getTaskId()."-3"?>"> <?php if($taskInternship->getAction3Date() != null){
                                                      echo $taskInternship->getAction3Date();
                                                    }else{ ?>
                                                        <div class="taskDone" class="check text-center">
                                                       
                                                        </div>
                                                      
                                                    <?php } ?></td>
                                                    <td><a href="./v_view_task.php?task=<?php echo $task->getTaskId()."&niu=".$internship->getNiuStudent() ?>" type='button' class='btn btn-info bg-success'><i class='fa fa-info-circle '></i></a></td>      
                                                 </tr>
                                           
                                       <?php }
                                      
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
                <table class="table table-bordered"  >
                        <thead>
                        <tr>
                        <th scope="col">Nom tasca</th>
                        <th scope="col">Data prevista</th>
                        <th scope="col">Data activitat 1</th>
                        <th scope="col">Data activitat 2</th>
                        <th scope="col">Data activitat 3</th>
                        <th scope="col" hidden>Informació</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                                Connection::openConnection();
                                $tasks = TaskController::getTasksByPhase(Connection::getConnection(), 3);
                                $tasksInternship = InternshipTaskController::getInternshipTasksByPhase(Connection::getConnection(), $internship->getIdInternship(), 3);
                               
                                foreach($tasks as $task){ ?>
                                    <tr>
                                    <td class='text-justify'><b><?php echo $task->getTaskName(); ?></b></td>
                                    
                                    <?php foreach ($tasksInternship as $taskInternship) {
                                      
                                       if($task->getTaskId() == $taskInternship->getTaskId()){ ?>
                                                  <td> 
                                                  <?php if($taskInternship->getTaskDate() != null){
                                                         echo "<b>".$taskInternship->getTaskDate()."</b>"   ;
                                                  }else{ echo "Sense data";
                                                  } ?>
                                                  </td>
                                                  <td  style="<?php if($taskInternship->getNormalAction1Date() != ""){
                                                                        if($taskInternship->getNormalTaskDate() < $taskInternship->getNormalAction1Date()){?>
                                                                                        background-color: #f2c4c9;   
                                                                      <?php  }else{ ?>
                                                                           background-color: #c2e5ca; 
                                                                    <?php  } 
                                                                    } ?>" class="taskDone" niu="<?php echo $internship->getNiuStudent() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getTaskId()."-1"?>"> <?php if($taskInternship->getAction1Date() != null){
                                                      echo $taskInternship->getAction1Date();
                                                    }else{ ?>
                                                        <div class="check text-center" >
                                                      
                                                        </div>
                                                      
                                                    <?php } ?>
                                                    </td>
                                                  <td style="<?php if($taskInternship->getNormalAction2Date() != ""){
                                                                        if($taskInternship->getNormalTaskDate()< $taskInternship->getNormalAction2Date()){?>
                                                                                        background-color: #f2c4c9;   
                                                                      <?php  }else{ ?>
                                                                           background-color: #c2e5ca; 
                                                                    <?php  } 
                                                                    } ?>" class="taskDone" niu="<?php echo $internship->getNiuStudent() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getTaskId()."-2"?>"><?php if($taskInternship->getAction2Date() != null){
                                                      echo $taskInternship->getAction2Date();
                                                    }else{ ?>
                                                        <div class="check text-center">
                                                      
                                                        </div>
                                                      
                                                    <?php } ?></td>
                                                  <td style="<?php if($taskInternship->getNormalAction3Date() != ""){
                                                                        if($taskInternship->getNormalTaskDate()< $taskInternship->getNormalAction3Date()){?>
                                                                                        background-color: #f2c4c9;   
                                                                      <?php  }else{ ?>
                                                                           background-color: #c2e5ca; 
                                                                    <?php  } 
                                                                    } ?>" class="taskDone" niu="<?php echo $internship->getNiuStudent() ?>" estancia="<?php echo $internship->getIdInternship() ?>" id="<?php echo $task->getTaskId()."-3"?>"> <?php if($taskInternship->getAction3Date() != null){
                                                      echo $taskInternship->getAction3Date();
                                                    }else{ ?>
                                                        <div class="taskDone" class="check text-center">
                                                       
                                                        </div>
                                                      
                                                    <?php } ?></td>
                                                    <td><a href="./v_view_task.php?task=<?php echo $task->getTaskId()."&niu=".$internship->getNiuStudent() ?>" type='button' class='btn btn-info bg-success'><i class='fa fa-info-circle '></i></a></td>      
                                                 </tr>
                                           
                                       <?php }
                                      
                                   }
                                   
                               }?>
                             
                    </tbody>
                </table>
            </div>
            <br>
           
           
       
        </div>
    
       
    
        <br>
        <br>
        <div class="container text-right">
             <a href="../views/v_insertComment.php?niu=<?php  echo $internship->getNiuStudent() ?>&id=<?php  echo $internship->getIdInternship() ?>" class="btn btn-success escriu-comentari" role="button">Afegir Comentari</a>
        </div>
      
        
        <div class="comentaries-tutor container">
            <h5>Comentaris del tutor/a:</h5> 
            <?php  Connection::openConnection(); 
               $comments = CommentController:: getComments(Connection::getConnection(), $internship->getIdInternship());  
               if($comments !== null) {?>
            <table id="comentaris-tutor" class="table table-striped table-bordered">
                    <thead>
                        <tr>
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
        </div>
        
       
       
      
 <!--   LÓGICA DE ACTUALIZAR ENVIO DATOS MODAL BASE DE DATOS -->
        <?php
            
            if(isset($_POST['modificaAlumno'])){
                
                    Connection::openConnection();
                     $mention = $_POST['mencionAlumno'];
                     $mentionId = StudentController::getMentionId(Connection::getConnection(), $mention);
                    StudentController::updateStudentByNiu(Connection::getConnection(), $internship->getNiuStudent(), $_POST['nombreAlumno'], $_POST['apellidoAlumno'], $_POST['emailAlumno'], $_POST['telefonoAlumno'], $mentionId);
                    
                    UserController::updateStudentByNiu(Connection::getConnection(), $internship->getNiuStudent(),$_POST['nombreAlumno'],$_POST['apellidoAlumno'], $_POST['telefonoAlumno'], $_POST['emailAlumno'], 2);
                    echo '<script> window.location.replace("'.VIEWINTERNSHIP."?niu=".$internship->getNiuStudent().'")</script>';
          
            }
            if(isset($_POST['modificaProfesor'])){
                Connection::openConnection();
                $nombreEmpresa = $_POST['empresaProfesor'];
                if($extTeacher !== null){
                    ExternalTeacherController::updateCompanyNameById(Connection::getConnection(), $extTeacher->getIdCompany(), $nombreEmpresa);
                    ExternalTeacherController::updateExternalTeacherById(Connection::getConnection(), $internship->getIdExternalTeacher(), $_POST['nombreProfesor'], $_POST['apellidoProfesor'],
                    $_POST['emailProfesor'], $_POST['telefonoProfesor']);
                    echo '<script> window.location.replace("'.VIEWINTERNSHIP."?niu=".$internship->getNiuStudent().'")</script>';
                }else{
                  
                    Connection::openConnection();
                    CompanyController::insertCompany(Connection::getConnection(), $_POST['empresaProfesor']);
                    $empresa = CompanyController::getCompanyByName(Connection::getConnection(), $_POST['empresaProfesor']);
                    
                    ExternalTeacherController::insertTeacher(Connection::getConnection(), $_POST['nombreProfesor'], $_POST['apellidoProfesor'], $_POST['telefonoProfesor'],  $_POST['emailProfesor'], $empresa->getCompanyId());
                    $profesor =  ExternalTeacherController::getExternalTeacherByName(Connection::getConnection(), $_POST['nombreProfesor'],  $_POST['apellidoProfesor'] );
                   
                    InternshipController::updateInternshipTeacherAndCompany(Connection::getConnection(), $internship->getNiuStudent(), $profesor->getIdTeacher(), $empresa->getCompanyId());
                    echo '<script> window.location.replace("'.VIEWINTERNSHIPCOORD."?niu=".$internship->getNiuStudent().'")</script>';
                }
            }
            if(isset($_POST['modificaFechas'])){
                Connection::openConnection();
                   
                InternshipController::updateInternshipDates(Connection::getConnection(), $internship->getNiuStudent(), $_POST['fechaInicio'], $_POST['fechaFinal']);
                echo '<script> window.location.replace("'.VIEWINTERNSHIP."?niu=".$internship->getNiuStudent().'")</script>';
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
                            <input type="text" class="form-control" id="nombre-alumno" value="<?php echo $student->getStudentName() ?>" name="nombreAlumno">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Cognoms:</b></label>
                            <input class="form-control" id="apellido-alumno" name="apellidoAlumno" value="<?php echo $student->getStudentSurname() ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Email:</b></label>
                            <input class="form-control" id="email-alumno" name="emailAlumno" value="<?php echo $student->getStudentEmail() ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Telèfon:</b></label>
                            <input class="form-control" id="telefono-alumno" name="telefonoAlumno" value="<?php echo $student->getStudentTelf() ?>"></input>
                        </div>
                        
                        <div class="form-group">
                        <label for="message-text" class="col-form-label"><b>Menció:</b></label>
                        <select name="mencionAlumno" class="form-control" aria-label=".form-select-lg example">
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
                            <input type="text" class="form-control" id="nombre-profesor" name="nombreProfesor" value="<?php echo $extTeacher->getName(); ?>">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Cognom:</b></label>
                            <input class="form-control" id="apellido-profesor" name="apellidoProfesor" value="<?php echo $extTeacher->getSurname(); ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Email:</b></label>
                            <input class="form-control" id="email-profesor" name="emailProfesor" value="<?php echo $extTeacher->getEmail(); ?>"></input>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label"><b>Telèfon:<b></label>
                            <input class="form-control" id="telefono-profesor" name="telefonoProfesor" value="<?php echo $extTeacher->getTelf(); ?>"></input>
                        </div>
                        <div class="form-group">
                             <?php $idEmpresa = $extTeacher->getIdCompany(); 
                                    $nombreEmpresa = ExternalTeacherController::getExternalTeacherCompany(Connection::getConnection(), $idEmpresa)?>
                            <label for="message-text" class="col-form-label"><b>Empresa:<b></label>
                            <input class="form-control" id="empresa-profesor" name="empresaProfesor" value="<?php echo $nombreEmpresa ?>"></input>
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
                                <input type="date" class="form-control" id="fecha-inicio"  name="fechaInicio">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label"><b>Data de finalització:</b></label>
                                <input class="form-control" type="date" id="fecha-final"  name="fechaFinal"></input>
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