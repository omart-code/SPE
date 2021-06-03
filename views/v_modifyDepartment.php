<?php


include_once '../includes/libraries.inc.php';
$title = 'ASSIGN DEPARTMENT';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/DegreeController.inc.php';
include_once '../controllers/DegreeCourseTeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';
?>

    
        

       <?php
         Connection::openConnection(); 
         $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
        
        ?>
        <div class="container-fluid" style="width:80%;" id="grado" grado="<?php echo $coordinator->getCoordinatorDegreeId()?>">
        <br>
            <h1>Modificar un departament</h1>

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
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                
              </ul>

            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Assigna un departament</h5>
                    <p class="card-text">Assigna un departament a un grau</p>
                    
                </div>
            </div>

            
            <br>
            <br>

            <form method="POST" action="../proc/modifyDepartment.php">
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"><b>Sel·lecciona un grau:</b></label>
                
                    <?php Connection::openConnection();
              
                        $degrees = DegreeController::getDegrees(Connection::getConnection());
                        ?>
                <select id="grau" class="selectpicker form-control" name="grau" required>
                
            
              
                       
                    
                <?php  foreach ($degrees as $degree) { ?>
                        <option value="<?php echo $degree->getDegreeId()?>"><?php echo $degree->getDegreeName()?></option>
                    <?php }?>
                
                </select> 
            </div>  
           
           <?php $departments = DepartmentController::getDepartments(Connection::getConnection()); ?>
           <div class="mb-3">
                <label><b>Departaments:</b></label><br />
                 <select name="departament" id="departaments" class="selectpicker form-control" required>
                    
                    <?php  foreach ($departments as $department) { ?>
                        <option value="<?php echo $department->getDepartmentId()?>"><?php echo $department->getDepartmentName()?></option>
                    <?php }?>
                </select>
                   
            </div>

            <br>
            <br>
           
            <br>
            <br>
            <div class="mb-3">
                    
                 <button type="submit" class="btn btn-success" name="ModificaDepartament">Modifica</button>
            </div> 


            </form>
           
        
        
     

       
  
            <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
            <br>
            <br>
</div>





