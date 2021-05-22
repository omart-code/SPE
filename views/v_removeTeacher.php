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
include_once '../controllers/DegreeCourseTeacherController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';
?>

    
        
      <?php
      if(isset($_POST['eliminarProfessor'])){
          if(isset($_POST['nomProfessor']) && isset($_POST['cursoGrado']) ){
            Connection::openConnection(); 
            //eliminar professor de profesores_curso_grado
            DegreeCourseTeacherController::removeDegreeCourseTeacher(Connection::getConnection(), $_POST['cursoGrado'], $_POST['nomProfessor']);
             echo '<script>window.location.replace("'.TEACHERS.'")</script>';
    
          }
      
      }
       ?>
       <?php
         Connection::openConnection(); 
         $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
        
        ?>
        <div class="container h-100">
            <h1>VISTA DE ELIMINAR UN PROFESOR</h1>

            <br>
            <br>

            <ul class="nav nav-tabs ">
                    <li class="nav-item">
                        <a class="nav-link active" style="color: #28a745;" aria-current="page" href="<?php echo TEACHERS?>"><h6>Professorat</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo DEPARTMENTS?>"><h6>Departaments</h6></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #28a745;" href="<?php echo COURSES?>"><h6>Nou Curs</h6></a>
                    </li>
                
              </ul>

            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Elimina professor</h5>
                    <p class="card-text">Elimina a un professor com a tutor de pràctiques</p>
                    
                </div>
            </div>

            
            <br>
            <br>

            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"><b>Sel·lecciona grau i curs</b></label>
                
            
                <select id="cursosGraus" class="selectpicker form-control" name="cursoGrado" required="true" onChange="getTeachers()">
                
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
                <label><b>Professors:</b></label><br />
                 <select name="nomProfessor" id="professors" class="selectpicker form-control">
                    <option value="">Selecciona un professor a eliminar</option>
                </select>
                   
            </div>  
           
            <div class="mb-3">
                    
              <button type="submit" class="btn btn-success" name="eliminarProfessor">Elimina</button>
            </div>        
            </form>
           
        
        
     

       
  
            <button type="button" class=" btn btn-secondary" onclick="history.back(-1)"><i class="fas fa-arrow-left"></i> Torna Enrere</button>
            <br>
            <br>
        </div>
      
        
<script>
function getTeachers() {
    var cursGrau = $('select[name=cursoGrado] option').filter(':selected').val()
        console.log(cursGrau);
        
	$.ajax({          
        	type: "POST",
        	url: "../ajax/getTeachersDegreeCourse.php",
        	data:'cursogrado='+cursGrau,
        	success: async function(data){
                $("#professors").html(data);
           // await window.location.replace("http://localhost/spe/views/v_view-internship.php?niu="+niu);
          },
          error: function(err){
              console.log('error:'+err);
          }
	});
}
</script>