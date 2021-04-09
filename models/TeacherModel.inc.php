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
                print 'ERROR'. $ex->getMessage();
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
                print 'ERROR'. $ex->getMessage();
            }
        }

        return $teachers;

       
    }

    //Inserta un profesor en la BD
    public static function insertTeacher($conn, $nombre, $apellido, $niu_profesor,  $telefono, $email, $id_departamento){
        //TAL VEZ TAMBIEN TIENES QUE HACER EL INSERT EN LA TABLA USUARIOS, NO SOLO EN PROFESORES!!!!!!

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
                print 'ERROR'. $ex->getMessage();
            }
        }

       
    }
}


?>