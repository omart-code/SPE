<?php

    class StudentModel{

        //Devuelve un estudiante por su niu
        public static function getStudentByNiu($conn, $niu_estudiante){
            $student = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Student.inc.php';
                    $sql = "SELECT * FROM estudiantes e WHERE e.niu_estudiante = :niu_estudiante";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_estudiante', $niu_estudiante, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
    
                    if(!empty($res)){
                        $student = new Student( $res['niu_estudiante'],$res['nombre'],$res['apellido'], $res['email'], $res['telefono'] ,$res['id_mencion'] ,$res['id_grado']);
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $student;
        }

        //Actualiza los datos de un estudiante en funcion de su niu
        public static function updateStudentByNiu($conn, $niu_estudiante, $nombre, $apellido, $email, $telefono, $id_mencion){
            $student = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Student.inc.php';
                    $sql = "UPDATE estudiantes SET nombre=:nombre, apellido=:apellido, email=:email, telefono=:telefono, id_mencion=:id_mencion WHERE niu_estudiante = :niu_estudiante";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_estudiante', $niu_estudiante, PDO::PARAM_STR);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt ->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                    $stmt ->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt ->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_mencion', $id_mencion, PDO::PARAM_STR);
                    $stmt -> execute();
                  
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           
        }

        public static function getStudentMention($conn, $id_mencion){
            $mention = null;
    
            if(isset($conn)){
                try{
                   
                    $sql = "SELECT nombre FROM menciones m WHERE m.id_mencion = :id_mencion";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_mencion', $id_mencion, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
    
                    if(!empty($res)){
                        $mention=  $res['nombre'];
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $mention;
        }

        public static function getMentionsByStudentDegree($conn, $id_grado){
            $mentions = null;
    
            if(isset($conn)){
                try{
                    $sql = "SELECT nombre, id_mencion FROM menciones WHERE id_grado = :id_grado";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_grado', $id_grado, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetchAll();
    
                    if(count($res)){
                        foreach($res as $mention){
                            $mentions[] = $mention;
                        }}
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $mentions;
        }

        public static function getMentionId($conn, $nombre){
            $mention = null;
    
            if(isset($conn)){
                try{
                   
                    $sql = "SELECT id_mencion FROM menciones m WHERE m.nombre = :nombre";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
    
                    if(!empty($res)){
                        $mention=  $res['id_mencion'];
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $mention;
        }


         //función que inserta un nuevo estudiante, aunque no todos los campos..
        public static function insertStudent($conn, $niu_estudiante, $nombre, $apellido, $id_grado){
            
        
            if(isset($conn)){
                try{
                    
                    $sql = "INSERT INTO estudiantes (niu_estudiante, nombre, apellido, id_grado)
                    VALUES (:niu_estudiante, :nombre, :apellido, :id_grado)";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':niu_estudiante', $niu_estudiante, PDO::PARAM_STR);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt ->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                    $stmt ->bindParam(':id_grado', $id_grado, PDO::PARAM_STR);
                    
                
                    $stmt -> execute();
                    
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }

        
        }

        

        
       
    }

?>