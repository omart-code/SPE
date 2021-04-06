<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADD TEACHER';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/CourseController.inc.php';
include_once '../app/Redirection.inc.php';
?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      <?php
      if(isset($_POST['enviarCurs'])){
       Connection::openConnection(); 
       CourseController::insertCourse(Connection::getConnection(), $_POST["nomCurs"], $_POST["dataIniciCurs"], $_POST["dataFiCurs"]);
       Redirection::redirect(ADMINISTRATION);

         //TAL VEZ TAMBIEN TIENES QUE HACER EL INSERT EN LA TABLA USUARIOS, NO SOLO EN PROFESOREES!!!!!!
      }
       ?>
        <div class="container">
            <h1>VISTA DE AFEGIR UN CURS</h1>

            <br>
            <br>

            <div class="card text-center">
                <div class="card-body">
                   
                    <p class="card-text"><h5>Afegeix un nou curs a aquest grau</h5></p>
                    
                </div>
            </div>

            
            <br>
            <br>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Grau</label>
                <select class="form-control" name="grau">
                <option selected>Grau en Enginyeria Informàtica</option>
             <!-- AQUI DEBERÍAS PODER SELECCIONAR LOS DIFERENTES GRADOS DISPONIBLES -->   
            </select>
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
        
      
<?php include_once '../includes/footer.inc.php'; ?>