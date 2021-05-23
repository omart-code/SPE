<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include '../includes/libraries.inc.php'; 
    include '../controllers/InternshipController.inc.php'; 
    include '../controllers/TaskController.inc.php';
    include '../controllers/InternshipTaskController.inc.php'; 
    include '../controllers/DegreeCourseController.inc.php';
    include '../controllers/DegreeCourseTeacherController.inc.php';
    ?>
</head>
<body>
    <?php include '../includes/navbar.inc.php'; ?>
    <div class="container-fluid" style="width:80%;">
    
        <br>

        <h1>Estades del curs</h1>
        <br>
        <br>

    
                <select id="cursosEstancias" class="selectpicker form-control" name="cursogradoEstancias" required="true">
                
                            <option value="null" selected>Sel·lecciona un curs i grau</option>
                    
                    <?php 
                    Connection::openConnection();
                    $degreeCourses = DegreeCourseController::getDepartmentByDegree(Connection::getConnection(), $_SESSION['niu']);
                    foreach ($degreeCourses as $degreeCourse) { ?>
                            <option value="<?php echo $degreeCourse['id_curso_grado']?>"><?php echo $degreeCourse['nombre']?></option>
                        <?php }?>
                    
                </select>
                <br>
                <div class="text-right">
                    <button type="submit" niu="<?php echo $_SESSION['niu'];?>" class="btn btn-success" id="cercaEstades" onClick="getInternshipsTeacher()" name="cercaEstades">Cerca Estades</button>
                </div>
                <br>
        
                <div  id="internships"></div>
        
    </div>

        


</body>

<script src="../js/getInternshipsTeacher.js"> </script>
</html>

