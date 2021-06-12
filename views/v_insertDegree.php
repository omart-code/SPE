<?php 
include_once '../includes/libraries.inc.php';
$title = 'SPE';
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


    
    <!-- LÓGICA DE AÑADIR UN NUEVO GRADO -->
     
        <div class="container-fluid" style="width:80%;">
        <br>
            <h1>Afegir un grau</h1>

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
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" style="color: #28a745;" href="<?php echo DEGREES?>"><h6>Nou Grau</h6></a>
                    </li>
                
             </ul>

            <div class="card text-center">
                <div class="card-body">
                   
                    <p class="card-text"><h5>Afegeix un nou grau</h5></p>
                    
                </div>
            </div>

            
            <br>
            <br>

            <form method="POST" action="../proc/insertDegree.php">
            <?php Connection::openConnection(); ?>
            
            <br>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Nom:</b></label>
                <input type="text" class="form-control" name="nomGrau" placeholder="ex: Grau en Intel·ligència artificial" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Sigles:</b></label>
                <input type="text" class="form-control" name="siglesGrau" placeholder="ex: GIA"  pattern="[A-Z]{2-10}" title="Les sigles han de ser en majuscules i entre 2 i 10 caràcters" required></input>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Codi Assignatura:</b></label>
                <input type="number" class="form-control" name="assignaturaGrau" placeholder="ex: 21120" pattern="[0-9]{5}" title="El codi ha d'estar format per 5 digits" required>
            </div>
            
            <button type="submit" class="btn btn-success" name="enviarGrau">Afegeix</button>
            </form>
      
        </div>

        <div class="container-fluid" style="width:80%;">
        <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
        </div>
        