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
                print 'ERROR'. $ex->getMessage();
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
                    print 'ERROR'. $ex->getMessage();
                }
            }
    
           
        }
        
 }

?>