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
}


?>