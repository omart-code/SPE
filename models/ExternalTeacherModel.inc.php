<?php
 class ExternalTeacherModel {
    //Muestra la informacion del profesor externo
    public static function getExternalTeacher($conn, $id_tutor_externo){
        $ext = null;

        if(isset($conn)){
            try{
                include_once '../entities/ExternalTeacher.inc.php';
                $sql = "SELECT * FROM tutores_externos t WHERE t.id_tutor_externo = :id_tutor_externo";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':id_tutor_externo', $id_tutor_externo, PDO::PARAM_STR);
                $stmt -> execute();
                $res = $stmt-> fetch();

                if(!empty($res)){
                    $ext = new ExternalTeacher(
                        $res['id_tutor_externo'], $res['nombre'], $res['apellido'], $res['email'], 
                        $res['telefono'], $res['id_empresa'],
                        );
                }
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
        }

        return $ext;
    }

    
        //Actualiza los datos de un profesor externo en funcion de su id
        public static function updateExternalTeacherById($conn, $id_tutor_externo, $nombre, $apellido, $email, $telefono){
            $student = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/ExternalTeacher.inc.php';
                    $sql = "UPDATE tutores_externos SET nombre=:nombre, apellido=:apellido, email=:email, telefono=:telefono WHERE id_tutor_externo = :id_tutor_externo";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_tutor_externo', $id_tutor_externo, PDO::PARAM_STR);
                    $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                    $stmt ->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                    $stmt ->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt ->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                    $stmt -> execute();
                  
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
           
        }

        public function getExternalTeacherCompany($conn, $id_empresa){
            $empresa = null;
    
            if(isset($conn)){
                try{
                    include_once '../entities/Company.inc.php';
                    $sql = "SELECT nombre FROM empresas WHERE id_empresa = :id_empresa";
                    $stmt = $conn -> prepare($sql);
                    $stmt ->bindParam(':id_empresa', $id_empresa, PDO::PARAM_STR);
                    $stmt -> execute();
                    $res = $stmt-> fetch();
    
                    if(!empty($res)){
                        $empresa = $res['nombre'];
                    }
                }catch (PDOException $ex){
                    echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
                }
            }
    
            return $empresa;
        }

        
    //Inserta un profesor externo en la BD
    public static function insertTeacher($conn, $nombre, $apellido, $telefono, $email, $id_empresa){
        
        if(isset($conn)){
            try{
              
                $sql = "INSERT INTO tutores_externos (nombre, apellido, email, telefono, id_empresa)
                VALUES (:nombre, :apellido, :email, :telefono, :id_empresa)";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stmt ->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                $stmt ->bindParam(':telefono', $telefono, PDO::PARAM_STR);
                $stmt ->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt ->bindParam(':id_empresa', $id_empresa, PDO::PARAM_STR);
                $stmt -> execute();
                
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
        }

       
    }

    public function getExternalTeacherByName($conn, $nombre, $apellido){
        $teacher = null;
    
        if(isset($conn)){
            try{
                include_once '../entities/ExternalTeacher.inc.php';
                $sql = "SELECT * FROM tutores_externos WHERE nombre = :nombre AND apellido = :apellido";
                $stmt = $conn -> prepare($sql);
                $stmt ->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $stmt ->bindParam(':apellido', $apellido, PDO::PARAM_STR);
                $stmt -> execute();
                $res = $stmt-> fetch();

                if(!empty($res)){
                    $teacher =  new ExternalTeacher(
                        $res['id_tutor_externo'], $res['nombre'], $res['apellido'], $res['email'], 
                        $res['telefono'], $res['id_empresa'],
                        );
                }
            }catch (PDOException $ex){
                echo "<div class='container'>ERROR". $ex->getMessage()."</div><br>";
            }
        }

        return $teacher;
    }

        
 }

?>