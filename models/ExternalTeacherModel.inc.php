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
        
 }

?>