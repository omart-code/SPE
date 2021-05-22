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
include_once '../controllers/UserController.inc.php';
include_once '../app/Redirection.inc.php';
include_once '../includes/navbar.inc.php';
?>

    
        
      <?php
      if(isset($_POST['ModificaDepartament'])){
         if(isset($_POST['nomDepartament'])){
            
            Connection::openConnection(); 
           //modificar de departamentos
           DepartmentController::updateDepartment(Connection::getConnection(),$_POST['idDepartament'], $_POST['nomDepartament'], $_POST['siglesDepartament'],  $_POST['identificadorDepartament']);
          
          
          echo '<script>window.location.replace("'.DEPARTMENTS.'")</script>';
        }
          
      
      }
       ?>
       <?php
         Connection::openConnection(); 
         $coordinator = CoordinatorController::getCoordinatorByNiu( Connection::getConnection() , $_SESSION['niu']);
        
        ?>
        <div class="container h-100" id="grado" grado="<?php echo $coordinator->getCoordinatorDegreeId()?>">
            <h1>VISTA DE MODIFICAR UN DEPARTAMENT</h1>

            <br>
            <br>

            <ul class="nav nav-tabs ">
                    <li class="nav-item">
                        <a class="nav-link " style="color: #28a745;" aria-current="page" href="<?php echo TEACHERS?>"><h6>Professorat</h6></a>
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
                    <h5 class="card-title">Modifica departament</h5>
                    <p class="card-text">Modifica les dades d'un departament</p>
                    
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
                <label><b>Departaments:</b></label><br />
                 <select name="nomDepartament" id="departaments" class="selectpicker form-control" onChange="getDepartmentInfo()">
                    <option value="">Selecciona un departament a modificar</option>
                </select>
                   
            </div>

            <br>
            <br>
            <div class="departamentData">
           
            </div>
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

<script>
$(function() {   
                  

    $('#professors').change(function(){
        console.log('muestra');
        $('.profesorData').show( "slow", function() {
    
        });;
      
    });

});

function getDepartments() {
    var cursGrau = $('select[name=cursoGrado] option').filter(':selected').val()
       
        
	$.ajax({          
        	type: "POST",
        	url: "../ajax/getDepartmentsDegreeCourse.php",
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
function getDepartmentInfo() {
    var departament = $('select[name=nomDepartament] option').filter(':selected').val()
        
    var grado = document.getElementById('grado').getAttribute("grado");
    
        
	$.ajax({          
        	type: "POST",
        	url: "../ajax/getDepartmentInfo.php",
        	data:'departament='+departament+'&grado='+grado,
        	success: async function(data){
                console.log('data:' + data)
                $(".departamentData").html(data);
           
          },
          error: function(err){
              console.log('error:'+err);
          }
	}); 
}
</script>





