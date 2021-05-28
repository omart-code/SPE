<?php 
include_once '../includes/libraries.inc.php';
$title = 'ADD TEACHER';
include_once '../includes/doc-declaration.inc.php'; 
include_once '../app/Connection.inc.php';
include_once '../controllers/TeacherController.inc.php';
include_once '../controllers/UserController.inc.php';
include_once '../controllers/DepartmentController.inc.php';
include_once '../controllers/CoordinatorController.inc.php';
include_once '../controllers/DegreeCourseController.inc.php';
include_once '../controllers/DegreeDepartmentController.inc.php';
include_once '../controllers/DegreeCourseTeacherController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';
?>

    
        
      <?php
      if(isset($_POST['eliminarDepartament'])){
          if(isset($_POST['nomDepartament']) && isset($_POST['cursoGrado']) ){
            Connection::openConnection(); 
            //eliminar departamento de departamentos
            DepartmentController::removeDepartment(Connection::getConnection(), $_POST['nomDepartament']);
            //eliminar de departamentos grado
            DegreeDepartmentController::removeDegreeDepartment(Connection::getConnection(), $_POST['nomDepartament']);
            echo '<script>window.location.replace("'.DEPARTMENTS.'")</script>';
           
          }
      
      }
       ?>
       <?php
         Connection::openConnection(); 
         $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
        
        ?>
       <div class="container-fluid" style="width:80%;">
       <br>
            <h1>Eliminar un departament</h1>

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
                        <a class="nav-link active" style="color: #28a745;" href="<?php echo DEPARTMENTS?>"><h6>Departaments</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                
              </ul>

            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Elimina departament</h5>
                    <p class="card-text">Elimina un departament del curs acadèmic</p>
                    
                </div>
            </div>

            
            <br>
            <br>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"><b>Sel·lecciona grau i curs</b></label>
                
            
                <select id="cursosGraus" class="selectpicker form-control" name="cursoGrado" required="true" onChange="getDepartments()">
                
                <?php 
            
                Connection::openConnection();
                $degreeCoursesByDegree = DegreeCourseController::getDegreeCoursesByDegree(Connection::getConnection(), $coordinator->getCoordinatorDegreeId());?>
                        <option value="null" selected>Sel·lecciona un curs i grau</option>
                    
                <?php  foreach ($degreeCoursesByDegree as $degreeCourse) { ?>
                        <option value="<?php echo $degreeCourse->getDegreeCourseId()?>"><?php echo $degreeCourse->getDegreeCourseName()?></option>
                    <?php }?>
                
                </select> 
            </div>  
           
          
           <div class="mb-3">
                <label><b>Departaments</b></label><br />
                 <select name="nomDepartament" id="departaments" class="selectpicker form-control">
                    <option value="">Selecciona un departament a eliminar</option>
                </select>
                   
            </div>  
           <br>
           <br>
            <div class="mb-3">
                    
              <button type="submit" class="btn btn-success" name="eliminarDepartament">Elimina</button>
            </div>        
            </form>
           
        
        
     

       
  
            <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
            <br>
            <br>
        </div>
      
        
<script>
function getDepartments() {
    var cursGrau = $('select[name=cursoGrado] option').filter(':selected').val()
        console.log(cursGrau);
        
	$.proc({          
        	type: "POST",
        	url: "../proc/getDepartmentsDegreeCourse.php",
        	data:'cursogrado='+cursGrau,
        	success: async function(data){
                console.log('data'+data);
                $("#departaments").html(data);
           // await window.location.replace("http://localhost/spe/views/v_view-internship.php?niu="+niu);
          },
          error: function(err){
              console.log('error:'+err);
          }
	});
}
</script>