<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADD COURSE';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../app/Redirection.inc.php';
?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      <?php
      if(isset($_POST['enviarDepartament'])){
       Connection::openConnection(); 
       DepartmentController::insertDepartment(Connection::getConnection(), $_POST["nomDepartament"], $_POST["siglas"]);
       Redirection::redirect(DEPARTMENTS);

         //TAL VEZ TAMBIEN TIENES QUE HACER EL INSERT EN LA TABLA USUARIOS, NO SOLO EN PROFESOREES!!!!!!
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
                        <a class="nav-link active" style="color: #28a745;" href="<?php echo DEPARTMENTS?>"><h6>Departaments</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo ADDCOURSE?>"><h6>Nou Curs</h6></a>
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
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nomDepartament" placeholder="ex: Ciències de les Ones">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Sigles</label>
                <input type="text" class="form-control" name="siglas" placeholder="ex: CDLO" ></input>
           
            <br>
            <br>
            <button type="submit" class="btn btn-success" name="enviarDepartament">Afegeix</button>
            </form>
        
        </div>
        
      
<?php include_once '../includes/footer.inc.php'; ?>