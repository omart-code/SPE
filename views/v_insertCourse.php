<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADD COURSE';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/CourseController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/TaskController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';
?>


    
    <!-- LÓGICA DE AÑADIR UN NUEVO CURSO -->
     
        <div class="container-fluid" style="width:80%;">
        <br>
            <h1>Afegir un curs</h1>

            <br>
            <br>

            <ul class="nav nav-tabs ">
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" aria-current="page" href="<?php echo TEACHERS?>"><h6>Professorat</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COORDINATORS?>"><h6>Coordinadors</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo DEPARTMENTS?>"><h6>Departaments</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  active" style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                
             </ul>

            <div class="card text-center">
                <div class="card-body">
                   
                    <p class="card-text"><h5>Afegeix un nou curs a aquest grau</h5></p>
                    
                </div>
            </div>

            
            <br>
            <br>

            <form method="POST" action="../proc/insertCourse.php">
            <?php Connection::openConnection(); 
            $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
            $degreeId = $coordinator->getCoordinatorDegreeId();
            $degree = DegreeController::getDegreeById(Connection::getConnection(), $degreeId) ?>
            <div> 
            <label><b>Grau:</b></label>
            <select name="grauSelec" class="form-control" aria-label=".form-select-lg example">
            
            <option selected value="<?php echo $degree->getDegreeId()?>"><?php echo $degree->getDegreeName()?></option>
            
            
            </select>
            </div>
            <br>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Nom:</b></label>
                <input type="text" class="form-control" name="nomCurs" placeholder="ex: 2020-2021" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Data d'inici:</b></label>
                <input type="date" class="form-control" name="dataIniciCurs" placeholder="ex: 09/09/2020"  required></input>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Data de finalització:</b></label>
                <input type="date" class="form-control" name="dataFiCurs" placeholder="ex: 09/07/2021" required>
            </div>
            
            <button type="submit" class="btn btn-success" name="enviarCurs">Afegeix</button>
            </form>
      
        </div>

        <div class="container-fluid" style="width:80%;">
        <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
        </div>
        
      
