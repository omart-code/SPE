<?php 
include_once '../includes/libraries.inc.php';
$title = 'SPE';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/DegreeDepartmentController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';
?>


    
     
            
           
        
      

         
      
       
       <div class="container-fluid" style="width:80%;">
       <br>
            <h1>Afegir un departament</h1>

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
                    <li class="nav-item ">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo DEGREES?>"><h6>Nou Grau</h6></a>
                    </li>
                
            </ul>

            <div class="card text-center">
                <div class="card-body">
                   
                    <p class="card-text"><h5>Afegeix un nou departament</h5></p>
                    
                </div>
            </div>

            
            <br>
            <br>


        

            <form method="POST" action="../proc/insertDepartment.php">
            
            <br>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label"><b>Nom Departament:</b></label>
                <input type="text" class="form-control" name="nomDepartament" placeholder="ex: Ciències de les Ones" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Sigles:</b></label>
                <input type="text" class="form-control" name="siglas" placeholder="ex: CDLO" pattern="[A-Z]{1-5}" required></input>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label"><b>Identificador:</b></label>
                <input type="number" class="form-control" name="identificador" placeholder="ex: 921" pattern="[0-9]{1,7}" title="El identificador ha de tenir entre 1 i 7 digits" required ></input>
            </div>
            <br>
            <br>
            <button type="submit" class="btn btn-success" name="enviarDepartament">Afegeix</button>
            </form>

         
        
        </div>

        <div class="container-fluid" style="width:80%;">
        <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
        </div>
        
      
