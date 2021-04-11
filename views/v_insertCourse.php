<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADD COURSE';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/CourseController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../app/Redirection.inc.php';
?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      <?php
      if(isset($_POST['enviarCurs'])){
       Connection::openConnection(); 
       CourseController::insertCourse(Connection::getConnection(), $_POST["nomCurs"], $_POST["dataIniciCurs"], $_POST["dataFiCurs"]);
       Redirection::redirect(COURSES);

         //TAL VEZ TAMBIEN TIENES QUE HACER EL INSERT EN LA TABLA USUARIOS, NO SOLO EN PROFESOREES!!!!!!
      }
       ?>
        <div class="container h-100">
            <h1>VISTA DE AFEGIR UN CURS</h1>

            <br>
            <br>

            <ul class="nav nav-tabs ">
                    <li class="nav-item">
                        <a class="nav-link " style="color: #28a745;" aria-current="page" href="<?php echo TEACHERS?>"><h6>Professorat</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo DEPARTMENTS?>"><h6>Departaments</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                
             </ul>

            <div class="card text-center">
                <div class="card-body">
                   
                    <p class="card-text"><h5>Afegeix un nou curs a aquest grau</h5></p>
                    
                </div>
            </div>

            
            <br>
            <br>

                <?php Connection::openConnection(); 
            $degrees = DegreeController::getDegrees(Connection::getConnection());  ?>
            <div> <!-- Recoge los cursos de la bd, haz entity, model y controller y inserta en las options -->
            <label>Sel·lecciona Grau</label>
            <select class="form-control" aria-label=".form-select-lg example">
            <option selected>Sel·lecciona un grau</option>
            <?php foreach ($degrees as $key => $degree) { ?>
                <option value="<?php echo $key?>"><?php echo $degree->getDegreeName() ?></option>
            <?php } ?>
            
            </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nom</label>
                <input type="text" class="form-control" name="nomCurs" placeholder="ex: 2020-2021">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Data d'inici</label>
                <input type="date" class="form-control" name="dataIniciCurs" placeholder="ex: 09/09/2020" ></input>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Data de finalització</label>
                <input type="date" class="form-control" name="dataFiCurs" placeholder="ex: 09/07/2021">
            </div>
            
            <button type="submit" class="btn btn-success" name="enviarCurs">Afegeix</button>
            </form>
        
        </div>
        
      
