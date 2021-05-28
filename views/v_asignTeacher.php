<?php


include_once '../includes/libraries.inc.php';
$title = 'ASSIGN TEACHER';
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
            <h1>Assignar un professor</h1>

            <br>
            <br>

            <ul class="nav nav-tabs ">
            <li class="nav-item">
                        <a class="nav-link active" style="color: #28a745;" aria-current="page" href="<?php echo TEACHERS?>"><h6>Professorat</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COORDINATORS?>"><h6>Coordinadors</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="color: #28a745;" href="<?php echo DEPARTMENTS?>"><h6>Departaments</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                
              </ul>

            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Assigna un professor</h5>
                    <p class="card-text">Assigna un professor existent com a professor d'un curs grau</p>
                    
                </div>
            </div>

            
            <br>
            <br>

            <form method="POST" action="../proc/assignTeacher.php">
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"><b>Sel·lecciona un professor:</b></label>
                
                    <?php Connection::openConnection();
              
                        $teachers = TeacherController::getTeachers(Connection::getConnection());
                        ?>
                <select id="profes" class="selectpicker form-control" name="profesor" required>
                
            
              
                        <option value="" selected>Sel·lecciona un professor:</option>
                    
                <?php  foreach ($teachers as $teacher) { ?>
                        <option value="<?php echo $teacher->getTeacherNiu()?>"><?php echo $teacher->getTeacherName(). ' '.$teacher->getTeacherSurname()?></option>
                    <?php }?>
                
                </select> 
            </div>  
           
           <?php $departments = DepartmentController::getDepartments(Connection::getConnection()); ?>
           <div class="mb-3">
                <label><b>Sel·lecciona el curs i grau:</b></label><br />
                <select name="grauCursSelec" class="form-control" aria-label=".form-select-lg example">
                       
                       <?php 
               
                       Connection::openConnection();
                       $degreeCoursesByDegree = DegreeCourseController::getDegreeCoursesByDegree(Connection::getConnection(), $coordinator->getCoordinatorDegreeId()); ?>
                       <option selected>Sel·lecciona un grau i curs</option>
                           <?php foreach ($degreeCoursesByDegree as $degreeCourse) { ?>
                           <option value="<?php echo $degreeCourse->getDegreeCourseId()?>"><?php echo $degreeCourse->getDegreeCourseName()?></option>
                           <?php }?>
       
                   </select>
                   
            </div>
            <div class="mb-3">
            <label><b>Màxim d'estudiants a assignar:</b></label>
            <input type="number" class="form-control" name="maxEstudiants" placeholder="15">
            <br />
            </div>

            <br>
            <br>
           
            <br>
            <br>
            <div class="mb-3">
                    
                 <button type="submit" class="btn btn-success" name="ModificaDepartament">Assigna</button>
            </div> 


            </form>
           
        
        
     

       
  
            <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
            <br>
            <br>
</div>