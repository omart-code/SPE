<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADD DEPARTMENT';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/DegreeDepartmentController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';
?>


    
        
      <?php
      if(isset($_POST['enviarCoordinador'])){
        if(isset($_POST['grauSelec']) && isset($_POST['professorSelec'])){
            
            Connection::openConnection(); 
            CoordinatorController::insertCoordinator(Connection::getConnection(), $_POST['professorSelec'],$_POST['grauSelec']);
            //inserto en usuarios como coordinador.
            //obtengo los datos de usuario por el  niu profesor
            $user = UserController::getUserByNiuAndType(Connection::getConnection(), $_POST['professorSelec'], 1 );
           //actualizo el campo de tipo 2 de ese profesor y pongo un 3
            UserController::updateTeacherToCoord(Connection::getConnection(), $_POST['professorSelec'], 1);
            echo '<script>window.location.replace("'.COORDINATORS.'")</script>';
        }
      

         
      }
       ?>
        <div class="container-fluid" style="width:80%;">
        <br>
            <h1>Afegir un coordinador</h1>

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
                        <a class="nav-link " style="color: #28a745;" href="<?php echo DEPARTMENTS?>"><h6>Departaments</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                
            </ul>

            <div class="card text-center">
                <div class="card-body">
                   
                    <p class="card-text"><h5>Afegeix un nou coordinador de grau</h5></p>
                    
                </div>
            </div>

            
            <br>
            <br>


        

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            
            <?php Connection::openConnection(); 
            $degrees = DegreeController::getDegrees(Connection::getConnection());  ?>
            <div> 
            <label><b>Sel·lecciona Grau</b></label>
            <select name="grauSelec" class="form-control" aria-label=".form-select-lg example">
            <option selected>Sel·lecciona un grau</option>
            <?php foreach ($degrees as $key => $degree) { ?>
                <option value="<?php echo $degree->getDegreeId()?>"><?php echo $degree->getDegreeName() ?></option>
            <?php } ?>
            
            </select>
            </div>
            <br>
            <?php  Connection::openConnection(); 
             $teachers = TeacherController::getTeachers(Connection::getConnection()); ?>
            <div> 
            <label><b>Sel·lecciona Professor</b></label>
            <select name="professorSelec" class="form-control" aria-label=".form-select-lg example">
            <option selected>Sel·lecciona un professor</option>
            <?php foreach ($teachers as $key => $teacher) { ?>
                <option value="<?php echo $teacher->getTeacherNiu()?>"><?php echo $teacher->getTeacherName(). ' '. $teacher->getTeacherSurname() ?></option>
            <?php } ?>
            
            </select>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-success" name="enviarCoordinador">Afegeix</button>
            </form>

         
        
        </div>

        <div class="container-fluid" style="width:80%;">
        <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
        </div>
        
      
