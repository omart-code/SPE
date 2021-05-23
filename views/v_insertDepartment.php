<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADD DEPARTMENT';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/DegreeDepartmentController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';
?>


    
        
      <?php
      if(isset($_POST['enviarDepartament'])){
        if(isset($_POST['grauSelec'])){
            
            Connection::openConnection(); 
            //inserto en departamento
            DepartmentController::insertDepartment(Connection::getConnection(), $_POST["nomDepartament"], $_POST["siglas"], $_POST["identificador"]);
            //obtengo grado a partir de su nombre
            $degree = DegreeController::getDegreeByName(Connection::getConnection(), $_POST["grauSelec"]);
            //obtengo su id
            $degreeId = $degree->getDegreeId();
            //obtengo id  del departamento antes insertado
            $department = DepartmentController::getDepartmentByName(Connection::getConnection(), $_POST["nomDepartament"]);
            $departmentId = $department ->getDepartmentId();
            //inserto en departamentos_grado su id departamento y su id grado
            DegreeDepartmentController::insertDegreeDepartment(Connection::getConnection(), $departmentId, $degreeId);
            echo '<script>window.location.replace("'.DEPARTMENTS.'")</script>';
        }
      

         
      }
       ?>
        <div class="container">
            <h1>VISTA DE AFEGIR UN NOU DEPARTAMENT</h1>

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
                        <a class="nav-link active" style="color: #28a745;" href="<?php echo DEPARTMENTS?>"><h6>Departaments</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                
            </ul>

            <div class="card text-center">
                <div class="card-body">
                   
                    <p class="card-text"><h5>Afegeix un nou departament</h5></p>
                    
                </div>
            </div>

            
            <br>
            <br>


        

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            
            <?php Connection::openConnection(); 
            $degrees = DegreeController::getDegrees(Connection::getConnection());  ?>
            <div> <!-- Recoge los cursos de la bd, haz entity, model y controller y inserta en las options -->
            <label><b>Sel·lecciona Grau</b></label>
            <select name="grauSelec" class="form-control" aria-label=".form-select-lg example">
            <option selected>Sel·lecciona un grau</option>
            <?php foreach ($degrees as $key => $degree) { ?>
                <option value="<?php echo $degree->getDegreeName()?>"><?php echo $degree->getDegreeName() ?></option>
            <?php } ?>
            
            </select>
            </div>
            <br>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Nom Departament</b></label>
                <input type="text" class="form-control" name="nomDepartament" placeholder="ex: Ciències de les Ones">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Sigles</b></label>
                <input type="text" class="form-control" name="siglas" placeholder="ex: CDLO" ></input>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Identificador</b></label>
                <input type="text" class="form-control" name="identificador" placeholder="ex: 921" ></input>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-success" name="enviarDepartament">Afegeix</button>
            </form>

         
        
        </div>

        <div class="container">
        <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
        </div>
        
      
