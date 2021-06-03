<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADD COORDINATOR';
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
                   
                    <p class="card-text"><h5>Afegeix un nou/va coordinador/a de grau</h5></p>
                    
                </div>
            </div>

            
            <br>
            <br>


        

            <form method="POST" action="../proc/insertCoordinator.php">
            
            <?php Connection::openConnection(); 
            $degrees = DegreeController::getDegrees(Connection::getConnection());  ?>
            <div> 
            <label><b>Sel·lecciona Grau:</b></label>
            <select name="grauSelec" class="form-control" aria-label=".form-select-lg example" required>
            <?php foreach ($degrees as $key => $degree) { ?>
                <option value="<?php echo $degree->getDegreeId()?>"><?php echo $degree->getDegreeName() ?></option>
            <?php } ?>
            
            </select>
            </div>
            <br>
            <?php  Connection::openConnection(); 
             $teachers = TeacherController::getTeachers(Connection::getConnection()); ?>
            <div> 
            <label><b>Sel·lecciona Professor/a:</b></label>
            <select name="professorSelec" class="form-control" aria-label=".form-select-lg example" required>
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
        
      
