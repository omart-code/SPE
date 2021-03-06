<?php 
include_once '../includes/libraries.inc.php';
$title = 'SPE';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/DegreeCourseTeacherController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';
?>

    
        
     
       <?php
         Connection::openConnection(); 
         $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
         $departments = DepartmentController::getDepartmentByDegree(Connection::getConnection(), $coordinator->getCoordinatorDegreeId());
        ?>
       <div class="container-fluid" style="width:80%;">
       <br>
            <h1>Afegir un professor</h1>

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

            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Nou professor</h5>
                    <p class="card-text">Afegeix un nou professor</p>
                    
                </div>
            </div>

            
            <br>
            <br>

            <form method="POST" action="../proc/insertTeacher.php">
            
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Nom:</b></label>
                <input type="text" class="form-control" name="nomProfessor" placeholder="ex: Joan" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Cognom/s;</b></label>
                <input type="text" class="form-control" name="cognomProfessor" placeholder="ex: Martorell" required></input>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>NIU:</b></label>
                <input type="text" class="form-control" name="niuProfessor" pattern="[0-9]{7}" title="El niu ha de tenir 7 digits" placeholder="ex: 1111111">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"><b>E-mail:</b></label>
                <input type="email" class="form-control" name="emailProfessor" placeholder="ex: joanmartorel@gmail.com" required></input>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Tel??fon:</b></label>
                <input type="text" class="form-control" name="telefonProfessor" placeholder="ex: 666666666" pattern="[0-9]{9}" title="El tel??fon ha de contenir 9 digits num??rics" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Contrasenya:</b></label>
                <input type="password" class="form-control" required pattern=".{5,}" title="La contrasenya ha de tenir 5 o m??s caracters alfanum??rics" name="contrasenyaProfessor">
            </div>
            <?php Connection::openConnection(); 
            $departments = DepartmentController::getDepartmentByDegree(Connection::getConnection(), $coordinator->getCoordinatorDegreeId())  ?>
            <div> 
                <label><b>Departament</b></label>
                <select name="departamentProfessor" class="form-control" aria-label=".form-select-lg example" required>
                <?php foreach ($departments as $key => $dep) { ?>
                    <option value="<?php echo $dep["nombre"]?>"><?php echo $dep['nombre'] ?></option>
                <?php } ?>
                </select>
            </div>          
           <br>
           <br>
            <div class="mb-3">
                    
              <button type="submit" class="btn btn-success" name="enviarProfessor">Afegeix</button>
            </div>        
            </form>
           
        
        
     

       
  
            <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
            <br>
            <br>
        </div>
      
        
      
