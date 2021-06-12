<?php 
include_once '../includes/libraries.inc.php';
$title = 'SPE';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DepartmentController.inc.php';
?>

<?php include_once '../includes/navbar.inc.php'; ?>
    
        
      
<div class="container-fluid" style="width:80%;">
<br>
      <h1>Nou Grau</h1>
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
                    <li class="nav-item ">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" style="color: #28a745;" href="<?php echo DEGREES?>"><h6>Nou Grau</h6></a>
                    </li>
        </ul>

        <br>
        <br>
        
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Grau</h5>
                <p class="card-text">Afegeix un nou grau</p>
                <a href="<?php echo ADDDEGREE?>" class="btn btn-success">Afegeix</a>
            </div>
  
        </div>

        <br>
        <br>

       <!--  Recoge los grados de la bd, haz entity, model y controller y inserta en las options con foreach  -->
        <!-- <div>  
        <h5>Sel·lecciona Grau</h5>
        <select class="form-control" aria-label=".form-select-lg example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        </div> -->

       

    </div>