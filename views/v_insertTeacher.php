<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADD TEACHER';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../app/Redirection.inc.php';
?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      <?php
      if(isset($_POST['enviarProfessor'])){
          if(isset($_POST['departamentProfessor'])){
            Connection::openConnection(); 
            $department = DepartmentController::getDepartmentByName(Connection::getConnection(), $_POST['departamentProfessor']);
            $departmentId = $department->getDepartmentId();
            echo $departmentId;
            TeacherController::insertTeacher(Connection::getConnection(), $_POST["nomProfessor"], $_POST["cognomProfessor"], $_POST["niuProfessor"], 
             $_POST["telefonProfessor"], $_POST["emailProfessor"], $departmentId);
             UserController::insertUser(Connection::getConnection(), $_POST["niuProfessor"], $_POST["nomProfessor"], $_POST["cognomProfessor"],
             $_POST["telefonProfessor"], $_POST["emailProfessor"], 1);
             Redirection::redirect(TEACHERS);
    
            // TAL VEZ TAMBIEN TIENES QUE HACER EL INSERT EN LA TABLA USUARIOS, NO SOLO EN PROFESOREES!!!!!!
          }
      
      }
       ?>
        <div class="container h-100">
            <h1>VISTA DE AFEGIR UN PROFESOR</h1>

            <br>
            <br>

            <ul class="nav nav-tabs ">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: #28a745;" aria-current="page" href="<?php echo TEACHERS?>"><h6>Professorat</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo DEPARTMENTS?>"><h6>Departaments</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                
              </ul>

            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Nou professor</h5>
                    <p class="card-text">Afegeix un nou professor a aquest curs</p>
                    
                </div>
            </div>

            
            <br>
            <br>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nomProfessor" placeholder="ex: Joan">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Cognom/s</label>
                <input type="text" class="form-control" name="cognomProfessor" placeholder="ex: Martorell" ></input>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">NIU</label>
                <input type="text" class="form-control" name="niuProfessor" placeholder="ex: 1111111">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="emailProfessor" placeholder="ex: joanmartorel@gmail.com"></input>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Telèfon</label>
                <input type="text" class="form-control" name="telefonProfessor" placeholder="ex: 666666666">
            </div>
            <?php Connection::openConnection(); 
            $departments = DepartmentController::getDepartments(Connection::getConnection());  ?>
            <div> 
            <label>Departament</label>
            <select name="departamentProfessor" class="form-control" aria-label=".form-select-lg example">
            <option selected>Sel·lecciona un departament</option>
            <?php foreach ($departments as $key => $dep) { ?>
                <option value="<?php echo $dep->getDepartmentName()?>"><?php echo $dep->getDepartmentName() ?></option>
            <?php } ?>
            </select>
            </div>          
            <br>
            <br>
            <button type="submit" class="btn btn-success" name="enviarProfessor">Afegeix</button>
            </form>
           <?php var_dump($_POST) ?>
        
        </div>
        
      
