<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADMINISTRATION';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/InternshipController.inc.php';
?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      
    <div class="container">
      <h1>VISTA DE ADMINISTRACIÓ</h1>
      <br>
      <br>

        <ul class="nav nav-tabs ">
            <li class="nav-item">
                <a class="nav-link active" style="color: #28a745;" aria-current="page" href="#"><h6>Professorat</h6></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #28a745;" href="#"><h6>Departaments</h6></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: #28a745;" href="#"><h6>Nou Curs</h6></a>
            </li>
           
        </ul>

        <br>
        <br>
        
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Professorat</h5>
                <p class="card-text">Afegeix un nou professor a aquest curs</p>
                <a href="<?php echo ADDTEACHER?>" class="btn btn-success">Afegeix</a>
            </div>
  
        </div>

        <br>
        <br>

        <div> <!-- Recoge los cursos de la bd, haz entity, model y controller y inserta en las options -->
        <h5>Sel·lecciona Curs</h5>
        <select class="form-control" aria-label=".form-select-lg example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        </div>

        <br>
        <br>

        <div> <!-- Recoge los cursos de la bd, haz entity, model y controller y inserta en las options -->
        <h5>Sel·lecciona Grau</h5>
        <select class="form-control" aria-label=".form-select-lg example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        </div>

    </div>
        
      
<?php include_once '../includes/footer.inc.php'; ?>