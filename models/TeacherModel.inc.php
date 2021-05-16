<?php

class TeacherModel{

    //Recupera un profesor por su niu
    public static function getTeacherByNiu($conn, $niu_profesor){
        $teacher = null;

        if(isset($conn)){
            try{
                include_once '../entities/Teacher.inc.php';
                $sql = "SELECT * FROM profesores p WHERE p.niu_profesor = :niu_profesor";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                $stmt -> execute();
                $res = $stmt-> fetch();

                if(!empty($res)){
                    $teacher = new Teacher( $res['niu_profesor'], $res['nombre'], $res['apellido'], $res['email'], $res['telefono'], $res['id_departamento']);
                }
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
        }

        return $teacher;
    }

     //Obtener todos los profesores disponibles
     public static function getTeachers($conn){
           
    
        $teachers = null;

        if(isset($conn)){
            try{
                include_once '../entities/Teacher.inc.php';
                $sql = "SELECT * FROM profesores";
                $stmt = $conn -> prepare($sql);
                $stmt -> execute();
                $res = $stmt-> fetchAll();
                if(count($res)){
                    foreach($res as $teacher){
                        $teachers[] = new Teacher(
                            $teacher['niu_profesor'], $teacher['nombre'], $teacher['apellido'], $teacher['email'], $teacher['telefono'], $teacher['id_departamento']);
                    } 
                 }else{
                        print 'No hi ha departaments disponibles';
                    }
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
        }

        return $teachers;

       
    }

    //Inserta un profesor en la BD
    public static function insertTeacher($conn, $nombre, $apellido, $niu_profesor,  $telefono, $email, $id_departamento){
      

        if(isset($conn)){
            try{
                include_once '../entities/Teacher.inc.php';
                $sql = "INSERT INTO profesores (niu_profesor, nombre, apellido, email, telefono, id_departamento)
                VALUES (:niu_profesor, :nombre, :apellido,:email, :telefono, :id_departamento)";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stmt ->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                $stmt ->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                $stmt ->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt ->bindParam(':id_departamento', $id_departamento, PDO::PARAM_STR);
                $stmt -> execute();
                
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
        }

       
    }

    public static function getTeachersInfo($conn, $id_curso_grado){
        $teachersInfo = null;
    
        if(isset($conn)){
            try{
               
                $sql = "SELECT pc.niu_profesor, p.nombre, p.apellido, d.nombre as nombre_departamento, d.siglas as siglas, pc.estudiantes_asignados, pc.max_estudiantes FROM profesores p INNER JOIN departamentos d ON d.id_departamento = p.id_departamento INNER JOIN profesores_curso_grado pc ON pc.niu_profesor = p.niu_profesor WHERE pc.id_curso_grado = :id_curso_grado";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
                $stmt -> execute();
                $res = $stmt-> fetchAll();
                if(count($res)){
                    foreach($res as $teacher){
                        $teachersInfo[] = $teacher;
                    } 
                 }else{
                        print 'No hi ha informació de profesors tutors disponible';
                    }
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
        }

        return $teachersInfo;
    }

    public static function getNumStudents($conn, $niu_profesor, $id_curso_grado){
        $numStudents = null;
    
        if(isset($conn)){
            try{
               
                $sql = "SELECT COUNT(id_estancia) as estudiantes_asignados FROM `estancias` WHERE niu_profesor = :niu_profesor AND id_curso_grado = :id_curso_grado";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
                $stmt -> execute();
                $res = $stmt-> fetch();
              
                if(!empty($res)){
                    $numStudents = $res;
                }
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
        }

        return $numStudents;
    }

    public function updateNumStudents($conn, $niu_profesor, $id_curso_grado, $numStudents){

        if(isset($conn)){
            try{
               
                $sql = "UPDATE profesores_curso_grado SET estudiantes_asignados=:numStudents WHERE niu_profesor = :niu_profesor AND id_curso_grado = :id_curso_grado";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':numStudents', $numStudents, PDO::PARAM_STR);
                $stmt ->bindParam(':niu_profesor', $niu_profesor, PDO::PARAM_STR);
                $stmt ->bindParam(':id_curso_grado', $id_curso_grado, PDO::PARAM_STR);
               
                $stmt -> execute();
              
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
        }
    }
   
    
}


?>