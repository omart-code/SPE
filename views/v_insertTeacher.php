<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADD TEACHER';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/InternshipController.inc.php';
?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      <?php
       Connection::openConnection(); 
       // $internships = InternshipController::getTeacherInternships(Connection::getConnection(), $_SESSION["niu"]); ?>
        <div class="container">
        <h1>VISTA DE AFEGIR UN PROFESOR</h1>

        <br>
        <br>

        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Nou professor</h5>
                <p class="card-text">Afegeix un nou professor a aquest curs</p>
                
            </div>
        </div>

        
        <br>
        <br>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nom</label>
            <input type="email" class="form-control" name="nomProfessor" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Cognom/s</label>
            <textarea class="form-control" name="cognomProfessor"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">NIU</label>
            <input type="email" class="form-control" name="niuProfessor" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">E-mail</label>
            <textarea class="form-control" name="emailProfessor"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Telèfon</label>
            <input type="email" class="form-control" name="telefonProfessor" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Departament</label>
            <textarea class="form-control" name="departamentProfessor"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Afegeix</button>
         
      
        </div>
        
      
<?php include_once '../includes/footer.inc.php'; ?>